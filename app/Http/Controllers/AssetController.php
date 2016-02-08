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

    // Asset Orders

    public function getAsset($asset)
    {
        /**
         * get_asset_info returns null
         * if an asset does not exist.
         *
         * So, I use it to ez validate.
         */
        $result = $this->counterparty->execute('get_asset_info', ['assets' => [$asset]]);

        if ( ! empty($result) )
        {
            $orders = $this->getOrders($asset); 
            $buy_orders = array_reverse($this->filterOrders($orders, 'BUY'));
            $sell_orders = $this->filterOrders($orders, 'SELL');
            $order_matches = $this->counterblock->execute('get_trade_history', ['asset1' => $asset, 'asset2' => 'XCP']);

            return view('asset', compact('asset','buy_orders','sell_orders','order_matches'));
        }

        /**
         * Asset not found
         */
        return redirect()->route('match')->with('warning', "{$asset} does not appear to be a valid Counterparty asset.");
    }

    protected function getOrders($asset)
    {
        return $this->counterblock->execute('get_market_orders', ['asset1' => $asset, 'asset2' => 'XCP']);
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