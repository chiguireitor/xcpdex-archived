@extends('layouts.app')

@section('title', 'New Orders')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-bell"></i></small> New Orders <small class="hidden-xs">Latest</small></h1>
    </div>

    @include('partials.orders-table', ['orders' => $orders])

@endsection