@extends('layouts.app')

@section('title', 'Open Orders')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-bell"></i></small> Orders <small class="hidden-xs">Last 100 Open</small></h1>
    </div>

    @include('partials.orders-table', ['orders' => $orders])

@endsection