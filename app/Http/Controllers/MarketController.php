<?php

namespace App\Http\Controllers;

use JsonRPC\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MarketController extends Controller
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

}