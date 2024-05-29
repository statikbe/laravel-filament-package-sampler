<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\TranslatablePage;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::enforceMorphMap([
            'page' => Page::class,
            'translatable_page' => TranslatablePage::class,
        ]);
    }
}
