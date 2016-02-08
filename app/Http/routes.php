<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {

    Route::get('markets', [
        'as'   => 'markets',
        'uses' => 'MarketController@getMarkets',
    ]);

    Route::get('order', [
        'as'   => 'order',
        'uses' => 'OrderController@getOrder',
    ]);

    Route::post('order', [
        'as'   => 'order::create',
        'uses' => 'OrderController@postOrder',
    ]);

    Route::get('order/raw-tx', [
        'as'   => 'order::result',
        'uses' => 'OrderController@getResult',
    ]);

    Route::get('match', [
        'as'   => 'match',
        'uses' => 'MatchController@getMatch',
    ]);

    Route::post('match', [
        'as'   => 'match::find',
        'uses' => 'MatchController@postMatch',
    ]);

    Route::get('{asset}', [
        'as'   => 'asset',
        'uses' => 'AssetController@getAsset',
    ]);

});
