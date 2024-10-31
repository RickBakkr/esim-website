<?php

use App\Models\Currency;

function varexport($expression, $return=FALSE) {
    $export = var_export($expression, TRUE);
    $patterns = [
        "/array \(/" => '[',
        "/^([ ]*)\)(,?)$/m" => '$1]$2',
        "/=>[ ]?\n[ ]+\[/" => '=> [',
        "/([ ]*)(\'[^\']+\') => ([\[\'])/" => '$1$2 => $3',
        "/[0-9]+ => \[/" => '[', // remove numeric indexes
    ];
    $export = preg_replace(array_keys($patterns), array_values($patterns), $export);
    if ((bool)$return) return $export; else echo $export;
}

function getRoute($name, $params = [], $locale = null) {
    if(is_null($locale)) {
        $locale = app()->getLocale();
    }
    $params['locale'] = $locale;

    return route($name, $params);
}

function getLanguages() {
    $languages = glob(base_path('lang/*'), GLOB_ONLYDIR);
    $languages = array_map(function($lang) {
        return basename($lang);
    }, $languages);

    return $languages;
}

function getSupportedNetworks() {
    $networks = glob(base_path('public/images/networks/*'));
    $networks = array_map(function($network) {
        return basename($network);
    }, $networks);

    // shuffle order
    shuffle($networks);

    return $networks;
}

function getRandomReviews($take = 3) {
    $reviews = trans('reviews');

    $reviews = collect($reviews)->shuffle()->take($take);

    return $reviews->toArray();
}

function formatPrice($price) {
    $currencyCode = strtoupper(
      session(config('session.constants.currency'), 'EUR')
    );

    return Currency::getFormattedPriceInCurrency($price, $currencyCode);
}

function slug(string $input) {
    $input = transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $input);

    return strtolower(
      preg_replace('/[^A-Za-z0-9-]+/', '-', $input)
    );
}
