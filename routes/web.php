<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route vers la page d'accueil
Route::get('/', [HomeController::class, 'index']);
