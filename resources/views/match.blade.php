@extends('layouts.app')

@section('title', 'Order Match')

@section('description', 'Find orders on the Dex that match your criteria and match them with only a few steps.')

@section('javascript')
    <script src="{{ url('js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ url('js/prefetch.js') }}"></script>
@endsection

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-search"></i></small> Order Match</h1>
    </div>

    @include('forms.match')

@endsection