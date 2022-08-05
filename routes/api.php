<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Word', 'prefix' => 'words'], function() {
    Route::post('/', 'StoreController');
    Route::get('/', 'IndexController');
    Route::patch('/{word}', 'UpdateController');
    Route::delete('/{word}', 'DeleteController');
});

Route::group(['namespace' => 'User', 'prefix' => 'user'], function() {
    Route::get('/', 'IndexController');
});
