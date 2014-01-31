Sitemap for Laravel 4
=====================

[![Build Status](https://travis-ci.org/studioushq/sitemap.png?branch=master)](https://travis-ci.org/studioushq/sitemap)

Sitemap is a package built specifically for Laravel 4 that will help you generate XML sitemaps for Google. Based on [laravel-sitemap](https://github.com/RoumenDamianoff/laravel-sitemap) this package operates in a slightly different way to better fit the needs of our project. A facade is used to access the sitemap class and we have added the ability to produce sitemap indexes as well as sitemaps. Furthermore, it's tested.

## Installation

Simply pop this in your `composer.json` file and run `composer update` (however your Composer is installed).

```
"studious/sitemap": "dev-master"
```

Now, add the service provider to your `app/config/app.php` file.

`'Studious\Sitemap\SitemapServiceProvider'`

## Usage
Coming soon