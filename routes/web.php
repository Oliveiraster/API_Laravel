<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('users', [UserController::class, 'getAll']);

Route::post('user', [UserController::class, 'create']);


Route::get('csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});
