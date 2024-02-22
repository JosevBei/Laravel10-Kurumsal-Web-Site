<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Notification;
use App\Models\SiteSettings; // Değişiklik burada

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
    public function boot()
    {
        view()->share('categories', Category::orderBy('name', 'asc')->get());
        view()->share('notifications', Notification::orderByDesc('created_at')->take(10)->get());
        view()->share('siteSettings', SiteSettings::where('id', 1)->first()); // Değişiklik burada
    }
}

