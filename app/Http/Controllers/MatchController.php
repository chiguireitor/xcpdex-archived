<?php

namespace App\Http\Controllers;

use JsonRPC\Client;
use App\Http\Requests\InstantMatchRequest;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MatchController extends Controller
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

    // New Matches

    public function getMatches()
    {
        $matches = $this->counterblock->execute('get_trade_history');

        return view('matches', ['matches' => $matches]);
    }

    // Match Form

    public function getMatch()
    {
        return view('match');
    }

    // Find Match

    public function postMatch(InstantMatchRequest $request)
    {
        /**
         * This is a simple redirect
         * for now, but it would be
         * cool to filter and match.
         */
        return redirect()->route('asset', ['asset' => $request->asset]);
    }
}