<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController; // Ajouté

// Page d'accueil
Route::get('/', [HomeController::class, 'index']);

// Authentification
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Gestion des articles
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Panier
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Favoris - accessible uniquement si l'utilisateur est connecté
Route::middleware(['auth'])->group(function () {
    Route::post('/favorites/{article}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{article}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
});
