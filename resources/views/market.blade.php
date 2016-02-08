@extends('layouts.app')

@section('title', "XCP Decentralized Exchange")

@section('description', 'XCP DEX is an open source application that uses a combination of Couterparty and Counterblock API\'s to make the Dex more accessible.')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-equalizer"></i></small> By Volume <small>Last 24 hours</small></h1>
    </div>

    @include('partials.market-table', ['markets' => $markets])

@endsection