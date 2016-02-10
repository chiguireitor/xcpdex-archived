<?php

namespace App\Http\Controllers;

use JsonRPC\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AssetController extends Controller
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

    // Asset Orders for XCP

    public function getAsset($asset)
    {
        if ( $asset == 'XCP' )
        return redirect()->route('home');

        /**
         * get_asset_info returns null
         * if an asset does not exist.
         *
         * So, I use it to ez validate.
         */
        $result = $this->counterparty->execute('get_asset_info', ['assets' => [$asset]]);

        if ( ! empty($result) )
        {
            /**
             * Get Orders on Asset
             */
            $orders = $this->getOrders($asset); 

            /**
             * Get Buy Orders + Reverse Order
             */
            $buy_orders = array_reverse($this->filterOrders($orders, 'BUY'));

            /**
             * Get Sell Orders
             */
            $sell_orders = $this->filterOrders($orders, 'SELL');

            /**
             * Get Old Matches
             */
            $order_matches = $this->counterblock->execute('get_trade_history', ['asset1' => $asset, 'asset2' => 'XCP']);

            /**
             * Deliver the Goods
             */
            return view('asset', compact('asset','orders','buy_orders','sell_orders','order_matches'));
        }

        /**
         * Asset not found
         */
        return redirect()->route('match')->with('warning', "{$asset} does not appear to be a valid Counterparty asset.");
    }

    // Asset Orders

    public function getBook($asset1, $asset2)
    {
        if ( $asset1 == 'XCP' )
        return redirect()->route('asset', ['asset' => $asset2]);

        /**
         * get_asset_info returns null
         * if an asset does not exist.
         *
         * So, I use it to ez validate.
         */
        $result1 = $this->counterparty->execute('get_asset_info', ['assets' => [$asset1]]);
        $result2 = $this->counterparty->execute('get_asset_info', ['assets' => [$asset2]]);

        if ( ! empty($result1) &&  ! empty($result2) )
        {
            /**
             * Get Orders on Asset
             */
            $orders = $this->getOrders($asset1, $asset2); 

            /**
             * Get Buy Orders + Reverse Order
             */
            $buy_orders = array_reverse($this->filterOrders($orders, 'BUY'));

            /**
             * Get Sell Orders
             */
            $sell_orders = $this->filterOrders($orders, 'SELL');

            /**
             * Get Old Matches
             */
            $order_matches = $this->counterblock->execute('get_trade_history', ['asset1' => $asset1, 'asset2' => $asset2]);

            /**
             * Deliver the Goods
             */
            return view('book', compact('asset1','asset2','orders','buy_orders','sell_orders','order_matches'));
        }

        /**
         * Asset not found
         */
        return redirect()->route('match')->with('warning', "{$asset1} or {$asset2} do not appear to be valid Counterparty assets.");
    }


    protected function getOrders($asset1, $asset2='XCP')
    {
        return $this->counterblock->execute('get_market_orders', ['asset1' => $asset1, 'asset2' => $asset2]);
    }

    protected function filterOrders($orders, $match)
    {
        $matches = array();
        foreach ( $orders as $order )
        {
            if ( strtoupper($match) === $order['type'] )
            {
                $matches[] = $order;
            }
        }
        return $matches;
    }

    protected function chartList($orders, $target)
    {
        $list = '';

        foreach ( $orders as $order )
        {
            if (empty($list))
            {
                $list = $order[$target];
            }

            $list = "{$list}, {$order[$target]}";
        }
        return $list;
    }

}