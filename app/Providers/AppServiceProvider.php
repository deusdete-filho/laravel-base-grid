<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\CategoriasObserver;
use App\Categorias;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Categorias::observe(CategoriasObserver::class);
    }
}
