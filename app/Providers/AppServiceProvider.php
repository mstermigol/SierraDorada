<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Service;
use App\Observers\ModelObserver;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        Event::observe(ModelObserver::class);
        Gallery::observe(ModelObserver::class);
        Service::observe(ModelObserver::class);
    }
}
