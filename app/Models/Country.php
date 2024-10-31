<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Log;

class Country extends Model
{

    protected $table = 'countries';
    protected $fillable = [
        'id',
        'code',
        'name',
    ];

    public function esimBundles() {
        return $this->hasMany(EsimBundle::class);
    }

    public function getDescriptionAttribute() {
        $keys = [
            'countryCode' => $this->code,
            'countryName' => trans('countries.' . $this->code),
        ];

        $translationKey = 'country-about.' . $this->code;
        $translationKeyLower = strtolower($translationKey);
        $genericTranslationKey = 'country-about.generic';

        if (trans()->has($translationKey)) {
            $description = trans($translationKey, $keys);
        } else if (trans()->has($translationKeyLower)) {
            $description = trans($translationKeyLower, $keys);
        } else if (trans()->has($genericTranslationKey)) {
            $description = trans($genericTranslationKey, $keys);
        }

        if(empty($description)) {
            Log::warning("Missing translation for 'country-about.{$this->code}' and 'country-about.generic'");
            $description = '<p>eSIM in ' . $this->name . '</p>';
        }

        // replace <p> to <p class="mb-4">
        $description = str_replace('<p>', '<p class="mb-4">', $description);

        return new HtmlString($description);
    }

}
