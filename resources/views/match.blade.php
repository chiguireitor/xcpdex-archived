@extends('layouts.app')

@section('title', 'Instant Match')

@section('javascript')
    <script src="{{ url('js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ url('js/prefetch.js') }}"></script>
@endsection

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-flash"></i></small> Instant Match</h1>
    </div>

    @include('forms.match')

@endsection