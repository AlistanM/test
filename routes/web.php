<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\MyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [MyController::class, 'login']);

Route::get('/register', [MyController::class, 'register']);

Route::get('/recover', [MyController::class, 'recover']);