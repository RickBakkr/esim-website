<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (!is_null($locale)) {
            if(is_dir(base_path('lang/' . $locale))) {
                App::setLocale($locale);
            } else {
                if(strlen($locale) != 2) {
                    $uri = $locale;
                    return redirect()->to(
                        config('app.fallback_locale') . '/' . $uri
                    );
                } else {
                    abort(404);
                }
            }
        } else {
            App::setLocale(config('app.fallback_locale'));
        }

        return $next($request);
    }
}
