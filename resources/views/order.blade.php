@extends('layouts.app')

@section('title', 'Create Order')

@section('description', 'Create a raw bitcoin transaction hex for your specific order requirements. Just sign and broadcast your hex to initiate the order.')

@section('meta')
    <link rel="canonical" href="{{ url(route('order')) }}" />
@endsection

@section('javascript')
    <script src="{{ url('js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ url('js/prefetch.js') }}"></script>
@endsection

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-edit"></i></small> Create Order</h1>
    </div>

    @include('forms.order')

@endsection