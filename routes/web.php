<?php

use Illuminate\Support\Facades\Route;

Route::get('/form-key/', [
    'middleware' => [],
    'uses' => \App\Http\Controllers\FormKeyController::class.'@generate'
]);

Route::post('/form-key/', [
    'middleware' => [],
    'uses' => \App\Http\Controllers\FormKeyController::class.'@check'
]);
