<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contacts', [WebController::class, 'index']);
Route::post('/contacts', [WebController::class, 'store']);
