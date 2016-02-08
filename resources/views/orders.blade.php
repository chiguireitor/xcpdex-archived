@extends('layouts.app')

@section('title', 'Latest Orders')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-bell"></i></small> Latest Orders <small class="hidden-xs">Last 100</small></h1>
    </div>

    @include('partials.orders-table', ['orders' => $orders])

@endsection