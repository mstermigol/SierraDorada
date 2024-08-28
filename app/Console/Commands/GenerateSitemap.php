<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap including dynamic slugs for various models';

    public function handle()
    {
        $sitemap = Sitemap::create();

        $sitemap->add(Url::create(url('/')));
        $sitemap->add(Url::create(url('/servicios')));
        $sitemap->add(Url::create(url('/eventos')));
        $sitemap->add(Url::create(url('/galerias')));
        $sitemap->add(Url::create(url('/caballos')));
        $sitemap->add(Url::create(url('/nosotros')));

        $this->addDynamicSlugRoutes($sitemap, Service::all(), '/servicios/{slug}');
        $this->addDynamicSlugRoutes($sitemap, Event::all(), '/eventos/{slug}');
        $this->addDynamicSlugRoutes($sitemap, Gallery::all(), '/galerias/{slug}');

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap has been generated!');
    }

    protected function addDynamicSlugRoutes(Sitemap $sitemap, $items, $route)
    {
        foreach ($items as $item) {
            $sitemap->add(Url::create(url(str_replace('{slug}', $item->slug, $route))));
        }
    }
}
