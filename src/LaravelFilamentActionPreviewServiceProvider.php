<?php

namespace Novius\LaravelFilamentActionPreview;

use Illuminate\Support\ServiceProvider;

class LaravelFilamentActionPreviewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'laravel-filament-action-preview');

        $this->publishes([
            __DIR__.'/../lang' => lang_path('vendor/laravel-filament-action-preview'),
        ], 'lang');
    }
}
