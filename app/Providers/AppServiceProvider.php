<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Categorie;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Injecter les catégories uniquement dans les vues utilisant layouts.app
        View::composer('layouts.app', function ($view) {
            $categories = Categorie::orderBy('nom')->get();
            $view->with('categories', $categories);
        });
    }
}
