<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;

// Route vers la page d'accueil
Route::get('/', [HomeController::class, 'index']);

// Routes d'authentification
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Routes pour la gestion des articles
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

