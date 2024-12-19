<?php

use App\Models\Currency;

function countrySuggestions() {
    $array = [];

    foreach(\App\Models\Country::all() as $country) {
        $array[] = [
            'name' => trans('countries.' . $country->code),
            'englishName' => $country->name,
            'flag' => asset('images/flags/' . strtolower($country->code) . '.svg'),
            'link' => getRoute('esim-bundle-per-country', ['countryCode' => strtolower($country->code), 'slug' => slug(trans('countries.' . strtoupper($country->code)))]),
        ];
    }

    return $array;
}

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
    $config = config('languages');

    $languages = glob(base_path('lang/*'), GLOB_ONLYDIR);
    $langaugesArray = [];

    foreach($languages as $lang) {
        if(!languagePossible(basename($lang))) {
            continue;
        }

        if(array_key_exists(basename($lang), $config)) {
            $langConfig = $config[basename($lang)];
            $name = $langConfig['name_native'];

            if(!is_null($langConfig['name_english'])) {
                $name .= ' (' . $langConfig['name_english'] . ')';
            }

            $name .= ' ' . $langConfig['emoji'];

            $langaugesArray[basename($lang)] = $name;
        } else {
            $langaugesArray[basename($lang)] = strtoupper(basename($lang));
        }
    }

    return $langaugesArray;
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
    $reviews = trans('reviews', [
        'organisationName' => config('app.name'),
    ]);

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

function getTranslationParameters($translation) {
    preg_match_all('/:(\w+)/', $translation, $matches);
    return $matches[0];
}

function languagePossible($language) {
    $language = trim($language);
    $limits = config('languages.limit');

    if(!is_dir(base_path('lang/' . $language))) {
        return false;
    }

    if(empty($limits) || trim(implode($limits)) == '') {
        return true;
    }

    return in_array($language, $limits);
}
