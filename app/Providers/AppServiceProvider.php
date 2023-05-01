<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        Schema::defaultStringLength(191);

        Paginator::useBootstrapFive();

        if (config('app.vercel.enabled')) {
            $paths = [
                '/tmp/framework/sessions',
                '/tmp/framework/cache',
                '/tmp/storage/bootstrap/cache',
                '/tmp/storage/framework/cache',
                config('view.compiled'),
            ];

            foreach ($paths as $path) {
                if (! is_dir($path)) {
                    mkdir($path, 0755, true);
                }
            }
        }
        
    }
}
