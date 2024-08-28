<?php

namespace App\Observers;

use Illuminate\Support\Facades\Artisan;

class ModelObserver
{
    public function created($model)
    {
        Artisan::call('sitemap:generate');
    }

    public function updated($model)
    {
        Artisan::call('sitemap:generate');
    }

    public function deleted($model)
    {
        Artisan::call('sitemap:generate');
    }
}
