<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavController;

Route::get('/',  [NavController::class, 'home'])->name('home');
Route::get('/login',  [NavController::class, 'login'])->name('login');
Route::post('/login', [NavController::class, 'logar'])->name('logar');
Route::get('/cadastro',  [NavController::class, 'cadastro']);
Route::post('/cadastro',  [NavController::class, 'create'])->name('create');



Route::get('csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});
