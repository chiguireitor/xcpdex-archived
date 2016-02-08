@extends('layouts.app')

@section('title', "{$asset} - Buy &amp; Sell on the Bitcoin Blockchain")

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-list-alt"></i></small> {{ $asset }} <small>Order Book</small></h1>
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

    <div class="row">
        <div class="col-sm-6">
            @include('partials.history-table', ['orders' => $order_matches])
        </div>
    </div>

@endsection