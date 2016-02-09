@extends('layouts.app')

@section('title', 'Order Matches')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-transfer"></i></small> Order Matches <small class="hidden-xs">Recent</small></h1>
    </div>

    @include('partials.matches-table', ['matches' => $matches])

@endsection