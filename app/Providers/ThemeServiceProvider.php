<?php

namespace App\Providers;


use App\View\ThemeViewFinder;
use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        parent::register();

        $this->app->singleton('view.finder', function ($app) {
            $finder = new ThemeViewFinder(
                $app['files'],
                $app['config']['view.paths']
            );

            $theme = config('app.theme');
            $finder->setTheme($theme);

            return $finder;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
