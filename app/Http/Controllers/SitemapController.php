<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EsimBundle;
use App\Services\SitemapService;

class SitemapController extends Controller
{

    public function index() {
        $sitemapService = new SitemapService('sitemapindex');
        $languages = getLanguages();

        foreach($languages as $language => $text) {
            $sitemapService->addSitemap(url('/sitemap-' . $language . '.xml'));
        }

        return response($sitemapService->getXml())->header('Content-Type', 'text/xml');
    }

    public function language($language) {
        $languages = getLanguages();
        $languages = array_keys($languages);

        if(!in_array($language, $languages)) {
            abort(404);
        }

        $sitemapService = new SitemapService('sitemap');

        // add homepage
        $sitemapService->addUrl(url('/' . $language), '2024-10-01', 'monthly', '1.0');

        // add supported devices
        try {
            $lastModification = filemtime(config_path('device-support.php'));
            $lastModification = date('Y-m-d', $lastModification);
        } catch (\Exception $e) {
            $lastModification = '2024-10-01';
        }
        $sitemapService->addUrl(url('/supported-devices'), $lastModification, 'monthly', '0.5');

        // loop through all countries
        $countries = Country::all();
        foreach($countries as $country) {
            $lastModification = '2024-10-01';
            $lastUpdatedBundle = EsimBundle::where('country_id', $country->id)->orderBy('updated_at', 'desc')->first();
            if($lastUpdatedBundle) {
                $lastModification = $lastUpdatedBundle->updated_at->format('Y-m-d');
            }

            $countrySlug = $country->code . '-' . trans('countries.' . $country->code, [], $language);
            $countrySlug = transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $countrySlug);
            $countrySlug = str_replace(' ', '-', $countrySlug);
            $countrySlug = strtolower($countrySlug);

            $sitemapService->addUrl(url('/' . $language . '/' . $countrySlug), $lastModification, 'monthly', '0.5');
        }

        return response($sitemapService->getXml())->header('Content-Type', 'text/xml');
    }

}
