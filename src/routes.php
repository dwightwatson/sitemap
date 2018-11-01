<?php

use Illuminate\Support\Facades\Route;
use Watson\Sitemap\Controllers\SitemapController;

Route::get('/sitemaps{parameters?}', SitemapController::class)
    ->where('parameters', '.+');
