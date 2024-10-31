<?php

use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap-index.xml', [SitemapController::class, 'index']);
Route::get('/sitemap-{language}.xml', [SitemapController::class, 'language']);
