<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Observers\ModelObserver;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Service;


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
