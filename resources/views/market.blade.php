@extends('layouts.app')

@section('title', 'XCPDex.com - Exchange Counterparty Tokens')

@section('description', 'XCP Dex is an open source application that uses a combination of Couterparty and Counterblock API\'s to make the Dex more accessible.')

@section('javascript')
    <script src="{{ url('js/jquery.tablesorter.min.js') }}"></script>
    <script>
        $(document).ready(function() { 
            $("#markets").tablesorter();
        }); 
    </script>
@endsection

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-equalizer"></i></small> Volume <small class="hidden-xs">Last 24 Hours</small></h1>
    </div>

    @include('partials.market-table', ['markets' => $top_chart])

@endsection