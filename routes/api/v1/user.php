<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('v1/user')->group(function () {
  Route::post('/', [UserController::class, 'createUser']);
  Route::post('/verify-otp', [UserController::class, 'verifyOTP']);
});
