<?php

use Illuminate\Support\Facades\Route;

Route::get('/form-key/', [
    'middleware' => [],
    'uses' => 'FormKeyController@generate'
]);

Route::post('/form-key/', [
    'middleware' => [],
    'uses' => 'FormKeyController@validate'
]);
