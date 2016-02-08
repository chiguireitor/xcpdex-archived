@extends('layouts.app')

@section('title', 'Order Generator')

@section('javascript')
    <script src="{{ url('js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ url('js/prefetch.js') }}"></script>
@endsection

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-credit-card"></i></small> Order Generator</h1>
    </div>

    @include('forms.order')

@endsection