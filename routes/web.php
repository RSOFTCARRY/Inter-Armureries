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
// Note : si UserFicheController et FicheUtilisateurController font doublon, supprime l’un des deux
use App\Http\Controllers\FicheUtilisateurController;

/*
|--------------------------------------------------------------------------
| Routes publiques
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Conditions Générales d'Utilisation
Route::get('/cgu', [HomeController::class, 'cgu'])->name('cgu');

// Authentification
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Article en lecture seule (public)
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

/*
|--------------------------------------------------------------------------
| Routes protégées (authentifiées)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Tableau de bord
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Fiche utilisateur (édition)
    Route::get('/user/fiche/edit', [UserFicheController::class, 'edit'])->name('user.fiche.edit');
    Route::put('/user/fiche/update', [UserFicheController::class, 'update'])->name('user.fiche.update');

    // Documents complémentaires (upload, dates, etc.)
    Route::post('/fiche-utilisateur', [FicheUtilisateurController::class, 'update'])->name('fiche-utilisateur.update');

    // Gestion des articles (admin)
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
});

/*
|--------------------------------------------------------------------------
| Route fallback (pour 404 personnalisée) – optionnelle
|--------------------------------------------------------------------------
*/
// Route::fallback(function () {
//     return response()->view('errors.404', [], 404);
// });
