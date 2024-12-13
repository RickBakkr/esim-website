<?php

namespace App\Http\Middleware;

use App\Models\Country;
use App\Models\Currency;
use Closure;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (!is_null($locale)) {
            if (is_dir(base_path('lang/' . $locale))) {
                App::setLocale($locale);
            } else {
                if (strlen($locale) != 2) {
                    $uri = $locale;
                    return redirect()->to(
                        config('app.fallback_locale') . '/' . $uri
                    );
                } else {
                    abort(404);
                }
            }
        } else {
            $locale = config('app.fallback_locale');

            $ip = $request->ip();
            $geoJs = file_get_contents('https://get.geojs.io/v1/ip/country.json?ip=' . $ip);
            $geo = json_decode($geoJs);

            if (isset($geo[0])) {
                $geo = $geo[0];
            }
            if ($geo && $geo->country) {
                $countryCode = $geo->country;
                $country = Country::where('code', $countryCode)->first();
                if ($country) {
                    // set locale
                    $defaultLanguage = $country->default_language;
                    if (is_dir(base_path('lang/' . $defaultLanguage))) {
                        $locale = $defaultLanguage;
                    }
                }

                $sessionKey = config('session.constants.currency');
                // set currency session
                $defaultCurrency = $country->default_currency;
                $currency = Currency::where('code', strtoupper($defaultCurrency))->first();
                if ($currency) {
                    session([$sessionKey => $currency->code]);
                }

            }

            App::setLocale($locale);
        }

        return $next($request);
    }
}
