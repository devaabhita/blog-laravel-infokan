<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Carbon::setLocale('id'); // tanggal: 12 Agu 2026

        View::composer('partials.footer', function ($view) {
            $view->with('footerCategories', Category::orderBy('id')->get());
        });
    }
}
