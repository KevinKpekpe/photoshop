<?php

namespace App\Providers;

use App\Http\ViewComposers\CartComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        //View::addNamespace('mail', resource_path('views/vendor/mail'));
        View::composer('*', CartComposer::class);
    }
}
