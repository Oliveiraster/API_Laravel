<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::post('login', [UserController::class, 'loginApi']);
Route::post('create',  [UserController::class, 'create']);
Route::middleware(['auth:api'])->get('users', [UserController::class, 'getAll']);
