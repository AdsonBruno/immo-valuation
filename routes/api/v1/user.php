<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/user')->group(function () {
  Route::post('/', [UserController::class, 'createUser']);
});