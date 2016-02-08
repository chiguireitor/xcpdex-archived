@extends('layouts.app')

@section('title', 'Raw Transaction')

@section('content')

    <div class="page-header">
        <h1><small><i class="glyphicon glyphicon-edit"></i></small> Sign &amp; Broadcast</h1>
    </div>

    <div class="row">
        <div class="col-sm-8">

        @if ( session('success') )

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Order Amount: <small>{{ old('get_quantity') }} {{ old('get_asset') }}</small></label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Order Total: <small>{{ old('give_quantity') }} {{ old('give_asset') }}</small></label>
                    </div>
                </div>
            </div>

            <div class="alert alert-warning">
                <b>Raw Transaction:</b>
                <p>{{ session('success') }}</p>
            </div>

            <hr />

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label style="margin-bottom: 15px">Effective Rate:</label>
                        <p>{{ old('get_asset') }}/{{ old('give_asset') }} <span class="pull-right">{{ ( old('get_quantity') / old('give_quantity') ) }}</span></p>
                        <p>{{ old('give_asset') }}/{{ old('get_asset') }} <span class="pull-right">{{ ( old('give_quantity') / old('get_quantity') ) }}</span></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <a href="https://wallet.counterwallet.io/" role="button" class="btn btn-lg btn-block btn-primary" target="_blank"><small><i class="glyphicon glyphicon-link"></i></small> Couterwallet</a>
                    </div>
                    <div class="form-group">
                        <a href="https://counterwallet.coindaddy.io/" role="button" class="btn btn-lg btn-block btn-primary" target="_blank"><small><i class="glyphicon glyphicon-link"></i></small> Coindaddy.io</a>
                    </div>
                </div>
            </div>

        @else
            <p>Not Found - No order details were processed.</p>
        @endif

        </div>
    </div>

@endsection