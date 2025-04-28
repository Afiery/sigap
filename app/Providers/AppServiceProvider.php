<?php

namespace App\Providers;

use App\Models\Notifikasi;
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
        view()->composer('*', function ($view) {
            $notifications = Notifikasi::where('status', 'pending')->get()->sortByDesc('created_at')->toArray();
            $allNotif = Notifikasi::all()->sortByDesc('created_at')->toArray();
            
            $view->with('notifications', $notifications);
            $view->with('allNotif', $allNotif);
        });
    }
}
