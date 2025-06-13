<?php

use App\Http\Controllers\ConsumeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ConsumeController::class, "getData"]);
Route::get('/home', [ConsumeController::class, "view"]);
