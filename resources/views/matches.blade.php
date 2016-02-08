@extends('layouts.app')

@section('title', 'Recent Matches')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-equalizer"></i></small> Recent Matches <small class="hidden-xs">Last 50</small></h1>
    </div>

    @include('partials.matches-table', ['matches' => $matches])

@endsection