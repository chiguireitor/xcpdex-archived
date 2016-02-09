@extends('layouts.app')

@section('title', "{$asset} - Order Book Prices")

@section('description', 'There are ' .  count($orders) . ' buy and/or sell orders for ' . $asset . ' on the Counterparty XCP decentralized exchange. ')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-list-alt"></i></small> {{ $asset }} <small class="hidden-xs">Order Book</small></h1>
    </div>

    @if( count($orders) === 0 )
        <div class="alert alert-warning">
            <i class="glyphicon glyphicon-info-sign"></i> There are no {{ $asset }}/XCP orders. It could be that this asset is trading on other pairs.
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6">
            @include('partials.order-table', ['title' => 'Sell', 'orders' => $sell_orders])
        </div>
        <div class="col-sm-6">
            @include('partials.order-table', ['title' => 'Buy', 'orders' => $buy_orders])
        </div>
    </div>


    <div class="page-header">
        <h2><small><i class="glyphicon glyphicon-calendar"></i></small> Trade History</h2>
    </div>

    @include('partials.history-table', ['orders' => $order_matches])

@endsection