@extends('layouts.app')

@section('title', 'Lastest Order Matches')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-transfer"></i></small> Lastest Matches <small>Last 50</small></h1>
    </div>

    @include('partials.matches-table', ['matches' => $matches])

@endsection