<?php

namespace App\Helpers;

use function config;

class SeoHelper
{
    protected static bool $initialized = false;

    protected static string $seoTitle = '';
    protected static string $seoDescription = '';
    protected static array $seoKeywords = [];

    public static function setTitle(string $seoTitle)
    {
        self::$seoTitle = $seoTitle;
    }

    public static function setDescription(string $seoDescription)
    {
        self::$seoDescription = $seoDescription;
    }

    public static function setKeywords(array|string $seoKeywords)
    {
        if(is_string($seoKeywords)) {
            $seoKeywords = explode(',', $seoKeywords);
        }
        self::$seoKeywords = $seoKeywords;
    }

    public static function addKeyword(string $keyword)
    {
        if(!is_array(self::$seoKeywords)) {
            self::$seoKeywords = [];
        }

        if(in_array($keyword, self::$seoKeywords)) {
            return;
        }

        self::$seoKeywords[] = $keyword;
    }

    public static function getTitle(): string
    {
        return self::$seoTitle ?: config('app.name'); // Fallback to app name
    }

    public static function getDescription(): string
    {
        return self::$seoDescription;
    }

    public static function getKeywords(): string
    {
        return implode(', ', self::$seoKeywords);
    }

    public static function initialize()
    {
        // Set default SEO values
        if(empty(self::$seoTitle)) {
            self::setTitle(trans('seo.title', ['site_name' => config('seo.name')]));
        }
        if(empty(self::$seoDescription)) {
            self::setDescription(trans('seo.description', ['site_name' => config('seo.name')]));
        }
        if(empty(self::$seoKeywords)) {
            self::setKeywords(trans('seo.keywords', ['site_name' => config('seo.name')]));
        }
    }

    public static function setForRoute(string $route, array $parameters = [])
    {
        $parameters['site_name'] = config('seo.name');

        $routeTranslations = trans('seo.routes.' . $route, $parameters);

        self::initialize();

        if($routeTranslations) {
            if(isset($routeTranslations['title'])) {
                self::setTitle($routeTranslations['title']);
            }
            if(isset($routeTranslations['description'])) {
                self::setDescription($routeTranslations['description']);
            }
            if(isset($routeTranslations['keywords'])) {
                self::setKeywords($routeTranslations['keywords']);
            }

            return true;
        }

        return false;
    }
}
