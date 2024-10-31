<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EsimBundle extends Model
{

    protected $table = 'esim_bundles';
    protected $fillable = [
        'id',
        'portal_bundle_id',
        'data_traffic_mb',
        'days_valid',
        'price',
        'country_id'
    ];

    public function getFormattedDataAttribute() {
        if($this->data_traffic_mb >= 1024) {
            return floor($this->data_traffic_mb / 1024) . ' GB';
        }
        return $this->data_traffic_mb . ' MB';
    }

    public static function getFromPerGbPriceForCountry(string $countryCode) {
        $country = Country::where('code', strtoupper($countryCode))->first();

        if(!$country) {
            return null;
        }

        return self::where('country_id', $country->id)
            ->selectRaw('MIN(price / (data_traffic_mb / 1024)) as lowest_price_per_gb')
            ->value('lowest_price_per_gb');
    }

}
