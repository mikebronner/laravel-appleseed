<?php namespace GeneaLabs\LaravelAppleseed\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelAppleseedServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider. Check for favicon request early, no need to load additional service providers and
     * framework functionality if it doesn't exist.
     *
     * @return void
     */
    public function register()
    {
        $this->findIconOrFail();
    }

    /**
     * Inspect the URL to see if it is looking for any common favicon. If the favicon doesn't exist, return a 404.
     */
    private function findIconOrFail()
    {
        $fileName = $_SERVER['REQUEST_URI'];
        $matches = [];
        preg_match_all('/(apple-touch-icon.*?\.png|favicon(?:.*?)\.(?:png|ico)|android-chrome.*?.png|manifest.json|safari-pinned-tab.svg|mstile.*?.png)/', $fileName, $matches);

        if (count($matches) > 1) {
            if (! file_exists(base_path($fileName))) {
                abort(404);
            }
        }
    }
}
