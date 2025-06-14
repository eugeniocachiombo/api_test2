<?php

use App\Http\Controllers\ConsumeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ConsumeController::class, "view"])->name("home");
Route::get('/pesquisa', [ConsumeController::class, "getBySeach"])->name("seach");
