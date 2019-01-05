<?php

use Illuminate\Support\Facades\Route;
use Watson\Sitemap\Http\SitemapController;

Route::get('/sitemaps{parameters?}', SitemapController::class)
    ->where('parameters', '.+');
