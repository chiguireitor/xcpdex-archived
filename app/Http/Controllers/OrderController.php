<?php

namespace App\Http\Controllers;

use JsonRPC\Client;
use App\Http\Requests\CreateOrderRequest;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    // New Up

    public function __construct()
    {
        /**
         * API Connections
         *
         * Setting: .env
         * Default: coindaddy.io
         */
        $this->counterblock = new Client(env('CB_API', 'http://public.coindaddy.io:4100/api/'));
        $this->counterblock->authentication(env('CB_USER', 'rpc'), env('CB_PASS', '1234'));

        $this->counterparty = new Client(env('CP_API', 'http://public.coindaddy.io:4000/api/'));
        $this->counterparty->authentication(env('CP_USER', 'rpc'), env('CP_PASS', '1234'));
    }

    // Order Form

    public function getOrder()
    {
        return view('order');
    }

    // Create Order

    public function postOrder(CreateOrderRequest $request)
    {
        /**
         * Unpack the request for clarity
         * to readers of the source code.
         */
        $get_asset = $request->get_asset;
        $get_quantity = toSatoshi($request->get_quantity);

        $give_asset = $request->give_asset;
        $give_quantity = toSatoshi($request->give_quantity);

        $source = $request->source;
        $expiration = (int) $request->expiration;

        /**
         * get_pubkey_for_address returns none
         * for addresses that aren't used yet.
         *
         * So, I use it to do basic validation.
         */
        if( $pubkey = $this->counterblock->execute('get_pubkey_for_address', ['address' => $source] ) )
        {
            /**
             * A source address should have enough
             * BTC for fees around 10,000 satoshis.
             */
            if ( $this->guardAgainstInsufficientBitcoinBalance($source) )
            {
                return redirect()->route('order')->with('warning', 'Insufficient BTC at this address. At least 0.0001 BTC is required for fees.')->withInput();
            }

            /**
             * A source address should have enough
             * give_asset for filling their order.
             */
            if ( $this->guardAgainstInsufficientAssetBalance($source, $give_asset, $give_quantity) )
            {
                $give_quantity = unSatoshi($give_quantity);
                return redirect()->route('order')->with('warning', "Insufficient {$give_asset} at this address. At least {$give_quantity} is required.")->withInput();
            }

            /**
             * The source address has the funds.
             * This creates an unsigned raw tx.
             */
            $orderHex = $this->counterparty->execute('create_order', [
                'source' => $source,
                'pubkey' => $pubkey,
                'give_asset'    => $give_asset,       
                'give_quantity' => $give_quantity,
                'get_asset'     => $get_asset,
                'get_quantity'  => $get_quantity,
                'expiration'    => $expiration,
                'allow_unconfirmed_inputs' => true,
                'fee_required' => 0,
            ]);

            /**
             * Send user to success page so they
             * can receive their raw tx hex code.
             */
            return redirect()->route('order::result')->withInput()->with('success', $orderHex);
        }

        /**
        * Unknown Address
        */
        return redirect()->route('order')->with('warning', "Your address: {$source} does not appear to be an actively used.")->withInput();
    }

    // Order Result

    public function getRawTx()
    {
        /**
         * Not stored, don't reload
         */
        return view('raw-tx');
    }

    // Markets JSON

    public function getMarkets()
    {
        /**
         * Used to generate JSON
         * of available markets.
         *
         * See: js/prefetch.js
         */
        $markets = $this->counterblock->execute('get_markets_list');

        $available = array();

        foreach ( $markets as $market )
        {
            $available[] = $market['base_asset'];
        }

        return $available;
    }

    // GUARDS

    protected function guardAgainstInsufficientBitcoinBalance($address)
    {
        /**
         * Uses Blockchain.info
         * (Hardcoded for now.)
         */
        $curl = new \anlutro\cURL\cURL;
        $response = $curl->get("https://blockchain.info/q/addressbalance/{$address}?confirmations=0");

        /**
         * Returns false if the
         * funds are sufficient
         */
        if ( $response->body > 0.0001 ) return false;

        /**
         * We have a problem.
         */
        return true;
    }

    protected function guardAgainstInsufficientAssetBalance($address, $asset, $quantity)
    {
        $results = $this->counterparty->execute('get_balances', [
            'filters' => [
                'field' => 'address',
                'op'    => '==',
                'value' => $address,
        ]]);

        /**
         * Look at all their balances.
         *
         * Not sure if there is a more
         * direct way to check these??
         */
        foreach ( $results as $result )
        {
            /**
             * Match by Name
             */
            if ( $asset === $result['asset'] )
            {
                /**
                 * Returns false if their
                 * asset balance is okay.
                 */
                if ( $quantity <= $result['quantity'] )
                {
                    return false;
                }
            }
        }

        /**
         * We have a problem.
         */
        return true;
    }

}