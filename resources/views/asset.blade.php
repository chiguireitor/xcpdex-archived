@extends('layouts.app')

@section('title', "{$asset} - Decentralized Order Book")

@section('description', 'There are ' . ( count($sell_orders) + count($buy_orders) ) . ' buy or sell orders for ' . $asset . ' on the Counterparty XCP decentralized exchange. ')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-list-alt"></i></small> {{ $asset }} <small class="hidden-xs">Order Book</small></h1>
    </div>

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