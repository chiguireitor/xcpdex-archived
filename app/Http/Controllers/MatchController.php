<?php

namespace App\Http\Controllers;

use JsonRPC\Client;
use App\Http\Requests\InstantMatchRequest;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MatchController extends Controller
{
    // Match Form

    public function getMatch()
    {
        return view('match');
    }

    // Find Match

    public function postMatch(InstantMatchRequest $request)
    {
        return redirect()->route('asset', ['asset' => $request->asset]);
    }
}