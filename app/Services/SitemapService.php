<?php

namespace App\Services;

class SitemapService
{

    private \DOMDocument $xmlDocument;

    public function __construct($type) {
        $this->xmlDocument = new \DOMDocument('1.0', 'UTF-8');
        $this->xmlDocument->formatOutput = true;

        if($type == 'sitemap') {
            $this->createSitemap();
        } else if($type == 'sitemapindex') {
            $this->createSitemapIndex();
        }
    }

    private function createSitemapIndex()
    {
        $sitemapindex = $this->xmlDocument->createElement('sitemapindex');
        $sitemapindex->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $this->xmlDocument->appendChild($sitemapindex);
    }

    private function createSitemap()
    {
        $urlset = $this->xmlDocument->createElement('urlset');
        $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $this->xmlDocument->appendChild($urlset);
    }

    public function addUrl(string $url, string $lastmod = '', string $changefreq = '', string $priority = '') {
        $urlset = $this->xmlDocument->getElementsByTagName('urlset')->item(0);
        $urlElement = $this->xmlDocument->createElement('url');
        $loc = $this->xmlDocument->createElement('loc', $url);
        $urlElement->appendChild($loc);
        if($lastmod != '') {
            $lastmodElement = $this->xmlDocument->createElement('lastmod', $lastmod);
            $urlElement->appendChild($lastmodElement);
        }
        if($changefreq != '') {
            $changefreqElement = $this->xmlDocument->createElement('changefreq', $changefreq);
            $urlElement->appendChild($changefreqElement);
        }
        if($priority != '') {
            $priorityElement = $this->xmlDocument->createElement('priority', $priority);
            $urlElement->appendChild($priorityElement);
        }
        $urlset->appendChild($urlElement);
    }

    public function addSitemap(string $loc, string $lastmod = '') {
        $sitemapindex = $this->xmlDocument->getElementsByTagName('sitemapindex')->item(0);
        $sitemapElement = $this->xmlDocument->createElement('sitemap');
        $locElement = $this->xmlDocument->createElement('loc', $loc);
        $sitemapElement->appendChild($locElement);
        if($lastmod != '') {
            $lastmodElement = $this->xmlDocument->createElement('lastmod', $lastmod);
            $sitemapElement->appendChild($lastmodElement);
        }
        $sitemapindex->appendChild($sitemapElement);
    }

    public function getXml(): string {
        return $this->xmlDocument->saveXML();
    }

}
