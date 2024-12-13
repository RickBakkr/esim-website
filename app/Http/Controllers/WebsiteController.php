<?php

namespace App\Http\Controllers;

use App\Helpers\SeoHelper;
use App\Models\Country;
use App\Models\Currency;

class WebsiteController extends Controller
{

    public function index() {
        SeoHelper::setForRoute('home');

        return view('website.index');
    }

    public function country(string $locale, string $countryCode, string $slug = null) {
        $country = Country::where('code', strtoupper($countryCode))->first();

        if(!$country) {
            abort(404);
        }

        SeoHelper::setForRoute('esim-bundle-per-country', [
            'countryName' => trans('countries.' . $country->code),
        ]);

        $esimBundles = $country->esimBundles()->orderBy('price', 'asc')->get();
        $plans = [];

        $currency = session(config('session.constants.currency'), 'EUR');

        $activeUsed = false;

        foreach($esimBundles as $esimBundle) {
            $name = $esimBundle->formattedData;
            if($esimBundle->data_traffic_mb > 500000) {
                $name = '∞';
            }

            $active = false;
            if($esimBundle->price > 8 && !$activeUsed) {
                $active = true;
                $activeUsed = true;
            }

            $price = Currency::getFormattedPriceInCurrency($esimBundle->price, $currency);

            $plans[] = [
                'id' => $esimBundle->id,
                'name' => $name,
                'price' => $price,
                'price_eur' => $esimBundle->price,
                'days_valid' => $esimBundle->days_valid,
                'data_traffic' => $esimBundle->formattedData,
                'link' => env('MIJN_GOSIM_URL') . 'cart/bundle/add/' . $esimBundle->portal_bundle_id . '?lang=' . $locale . '&currency=' . $currency,
                'active' => $active
            ];
        }

        $backgroundImage = null;
        $backgroundImage = glob(public_path('images/countryhead/' . $country->code . '.*'));
        if($backgroundImage) {
            $backgroundImage = asset(str_replace(public_path(), '', $backgroundImage[0]));
        } else {
            $backgroundImage = glob(public_path('images/countryhead/XX.*'));
            if($backgroundImage) {
                $backgroundImage = asset(str_replace(public_path(), '', $backgroundImage[0]));
            }
        }

        return view('website.country', [
            'country' => $country,
            'plans' => $plans,
            'backgroundImage' => $backgroundImage,
        ]);
    }

    public function destinations() {
        SeoHelper::setForRoute('destinations');

        $destinations = Country::all()->pluck('code')->toArray();

        // remove countries that don't have a flag
        $destinations = array_filter($destinations, function($destination) {
            return file_exists(public_path('images/flags/' . strtolower($destination) . '.svg'));
        });

        // make all country codes lowercase
        $destinations = array_map('strtolower', $destinations);

        return view('website.destinations', ['destinations' => $destinations]);
    }

    public function supportedDevices() {
        SeoHelper::setForRoute('supported-devices');

        return view('website.supported-devices');
    }

    public function about() {
        SeoHelper::setForRoute('about');

        return view('website.about');
    }

}
