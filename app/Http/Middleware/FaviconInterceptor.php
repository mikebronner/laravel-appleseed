<?php namespace GeneaLabs\LaravelAppleseed\Http\Middleware;

use Closure;

class FaviconInterceptor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $matches = [];
        $file = pathinfo($request->getUri());
        preg_match_all('/(apple-touch-icon.*?\.png|favicon(?:.*?)\.(?:png|ico)|android-chrome.*?.png|manifest.json|safari-pinned-tab.svg|mstile.*?.png)/', $file['basename'], $matches);

        if ((count($matches) > 1) && (! file_exists(public_path($file['basename'])))) {
            abort(404);
        }

        return $next($request);
    }
}
