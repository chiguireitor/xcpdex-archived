@extends('layouts.app')

@section('title', "{$asset1}/{$asset2} - Order Book")

@section('description', 'There are ' .  count($orders) . ' buy and/or sell orders on the ' . $asset1 . '/' . $asset2 . ' trading pair on the Counterparty XCP decentralized exchange. ')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-list-alt"></i></small> {{ $asset1 }} <small class="hidden-xs">Order Book</small></h1>
    </div>

    <div class="alert alert-warning"><i class="glyphicon glyphicon-exclamation-sign"></i> Non-XCP trade pairs are known to have display issues where a sell appears as a buy order, or vice versa, we're working to fix this problem.</div>

    @if( count($orders) === 0 )
        <div class="alert alert-warning">
            <i class="glyphicon glyphicon-info-sign"></i> There are no {{ $asset1 }}/{{ $asset2 }} orders. It could be that this asset is trading on other pairs.
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6">
            @include('partials.book-table', ['title' => 'Sell', 'orders' => $sell_orders])
        </div>
        <div class="col-sm-6">
            @include('partials.book-table', ['title' => 'Buy', 'orders' => $buy_orders])
        </div>
    </div>

    <div class="page-header">
        <h2><small><i class="glyphicon glyphicon-calendar"></i></small> Trade History</h2>
    </div>

    @include('partials.book-history-table', ['orders' => $order_matches])

@endsection