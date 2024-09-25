<?php

use App\Http\Controllers\UserController;
use App\Mail\OTPMail;
use App\Notifications\OTPNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/teste', function () {
    return response()->json(['message' => 'API funcionando corretamente']);
});

Route::post('/users', [UserController::class, 'createUser']);