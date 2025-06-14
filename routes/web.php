<?php

use App\Http\Controllers\ConsumeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ConsumeController::class, "view"]);
Route::get('/limit', [ConsumeController::class, "getByLimit"])->name("limit");
