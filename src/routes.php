<?php

use Watson\Sitemap\Controllers\SitemapController;

$router->get('/sitemaps{parameters?}', SitemapController::class)
    ->where('parameters', '.+');
