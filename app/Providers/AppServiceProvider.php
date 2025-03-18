<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\RequestItem;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            $totalRequestDiproses = RequestItem::where('status', 'Diproses')->count();
            $view->with('totalRequestDiproses', $totalRequestDiproses);
        });
    }
}
