@extends('layouts.app')

@section('title', 'XCP Dex - Counterparty XCP Token Exchange')

@section('description', 'XCP Dex is an open source application that uses Couterparty and Counterblock API\'s to make the Dex accessible outside of Counterwallet.')

@section('javascript')
    <script src="{{ url('js/jquery.tablesorter.min.js') }}"></script>
    <script>
        $(document).ready(function() { 
            $("#markets").tablesorter();
            $("#leaders").tablesorter();
        }); 
    </script>
@endsection

@section('content')

    <div class="page-header">
        <h2><small><i class="glyphicon glyphicon-random"></i></small> Exchange Rates</h2>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <iframe id="widget-ticker-preview" src="//www.coingecko.com/en/widget_component/ticker/counterparty/usd" style="border:none; height:125px; width: 275px;" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
        </div>
        <div class="col-sm-4">
            <iframe id="widget-ticker-preview" src="//www.coingecko.com/en/widget_component/ticker/counterparty/btc" style="border:none; height:125px; width: 275px;" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
        </div>
        <div class="col-sm-4">
             <iframe id="widget-ticker-preview" src="//www.coingecko.com/en/widget_component/ticker/bitcoin/usd" style="border:none; height:125px; width: 275px;" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
        </div>
    </div>

    <hr />
    <br />

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-equalizer"></i></small> Dex Volume <small class="hidden-xs">Last 24 Hours</small></h1>
    </div>

    @include('partials.market-table', ['markets' => $top_chart])

    <div class="page-header">
        <h2><small><i class="glyphicon glyphicon-calendar"></i></small> Assets Traded <small class="hidden-xs">Last 7 Days</small></h2>
    </div>

    @include('partials.leaders-table', ['markets' => $leaderboard])

@endsection