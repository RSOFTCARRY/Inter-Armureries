<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserFicheController;
use App\Http\Controllers\FicheUtilisateurController;

/*
|--------------------------------------------------------------------------
| Routes publiques
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentification
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Articles accessibles publiquement (lecture seule)
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');


/*
|--------------------------------------------------------------------------
| Routes protégées (authentifiées)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Gestion de la fiche utilisateur
    Route::get('/user/fiche/edit', [UserFicheController::class, 'edit'])->name('user.fiche.edit');
    Route::put('/user/fiche/update', [UserFicheController::class, 'update'])->name('user.fiche.update');

    // Gestion des articles (création, modification, suppression)
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

    // Favoris
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{article}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{article}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    // Panier
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/fiche-utilisateur', [FicheUtilisateurController::class, 'update'])->name('fiche-utilisateur.update');

});

/*
|--------------------------------------------------------------------------
| Route fallback pour gérer les URL non définies (optionnel)
|--------------------------------------------------------------------------
*/
// Route::fallback(function () {
//     return response()->view('errors.404', [], 404);
// });
