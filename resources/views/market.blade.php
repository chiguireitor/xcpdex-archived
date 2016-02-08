@extends('layouts.app')

@section('title', "Counterparty Asset Exchange Data")

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-list-alt"></i></small> Most Volume <small>Last 24 hours</small></h1>
    </div>

    @include('partials.market-table', ['markets' => $markets])

@endsection