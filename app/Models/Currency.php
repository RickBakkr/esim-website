<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $table = 'currencies';
    protected $fillable = [
        'id',
        'code',
        'name',
        'symbol',
        'eur_rate', // Euro is considered as base currency,
        'last_synced_at',

        'decimal_separator',
        'thousands_separator'
    ];

    protected $casts = [
        'eur_rate' => 'float',
        'last_synced_at' => 'datetime',
    ];

    public function esimBundles() {
        return $this->hasMany(EsimBundle::class);
    }

    public static function getPriceInCurrency($price, $currencyCode) {
        $currency = Currency::where('code', strtoupper($currencyCode))->first();
        if ($currency) {
            return $price * $currency->eur_rate;
        }
        return $price;
    }

    public static function getFormattedPriceInCurrency($price, $currencyCode) {
        $currency = Currency::where('code', strtoupper($currencyCode))->first();
        if ($currency) {
            return $currency->symbol . ' ' . number_format($price * $currency->eur_rate, 2, $currency->decimal_separator, $currency->thousands_separator);
        }
        return $price;
    }

}
