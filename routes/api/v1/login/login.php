<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::prefix('v1/login')->group(function () {
  Route::post('/', [AuthController::class, 'login']);
});
