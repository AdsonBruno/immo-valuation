<?php

use App\Http\Controllers\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('v1/report')->group(function () {
  Route::post('/', [ReportController::class, 'createReport']);
});
