<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
        'as'   => 'home',
        'uses' => 'MarketController@getHomepage',
    ]);

    Route::get('json', [
        'as'   => 'markets',
        'uses' => 'MarketController@getMarkets',
    ]);

    Route::get('orders', [
        'as'   => 'orders',
        'uses' => 'OrderController@getOrders',
    ]);

    Route::get('order', [
        'as'   => 'order',
        'uses' => 'OrderController@getOrder',
        'middleware' => 'doNotCacheResponse'
    ]);

    Route::post('order', [
        'as'   => 'order::create',
        'uses' => 'OrderController@postOrder',
    ]);

    Route::get('order/raw-tx', [
        'as'   => 'order::result',
        'uses' => 'OrderController@getResult',
        'middleware' => 'doNotCacheResponse'
    ]);

    Route::get('matches', [
        'as'   => 'matches',
        'uses' => 'MatchController@getMatches',
    ]);

    Route::get('match', [
        'as'   => 'match',
        'uses' => 'MatchController@getMatch',
        'middleware' => 'doNotCacheResponse'
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
