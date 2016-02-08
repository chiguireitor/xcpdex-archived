<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {

    Route::get('order', [
        'as'   => 'order',
        'uses' => 'OrderController@getOrder',
    ]);

    Route::get('markets', [
        'as'   => 'markets',
        'uses' => 'OrderController@getMarkets',
    ]);

    Route::get('order/raw-tx', [
        'as'   => 'order::result',
        'uses' => 'OrderController@getRawTx',
    ]);

    Route::post('order', [
        'as'   => 'order::create',
        'uses' => 'OrderController@postOrder',
    ]);

    Route::get('match', [
        'as'   => 'match',
        'uses' => 'OrderController@getMatch',
    ]);

    Route::post('match', [
        'as'   => 'match',
        'uses' => 'OrderController@postMatch',
    ]);

    Route::get('{asset}', [
        'as'   => 'asset',
        'uses' => 'AssetController@show',
    ]);

});
