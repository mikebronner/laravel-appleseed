<?php namespace GeneaLabs\Jumpstart;

use GeneaLabs\Jumpstart\Commands\Jumpstart;
use Illuminate\Support\ServiceProvider;

class LaravelAppleseedServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../../resources/views', 'genealabs-laravel-appleseed');
    }
}
