<?php

use App\Http\Controllers\ConsumeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ConsumeController::class, "view"])->name("home");
Route::get('/limit', [ConsumeController::class, "getByLimit"])->name("limit");
Route::get('/favourits/{image_id}', [ConsumeController::class, "addFavourit"])->name("add.favourit");
