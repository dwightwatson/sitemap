Sitemap for Laravel
===================

[![Build Status](https://travis-ci.org/dwightwatson/sitemap.png?branch=master)](https://travis-ci.org/dwightwatson/sitemap)
[![Total Downloads](https://poser.pugx.org/watson/sitemap/downloads.svg)](https://packagist.org/packages/watson/sitemap)
[![Latest Stable Version](https://poser.pugx.org/watson/sitemap/v/stable.svg)](https://packagist.org/packages/watson/sitemap)
[![Latest Unstable Version](https://poser.pugx.org/watson/sitemap/v/unstable.svg)](https://packagist.org/packages/watson/sitemap)
[![License](https://poser.pugx.org/watson/sitemap/license.svg)](https://packagist.org/packages/watson/sitemap)


Sitemap is a package built specifically for Laravel that will help you generate XML sitemaps for Google. Based on [laravel-sitemap](https://github.com/RoumenDamianoff/laravel-sitemap) this package operates in a slightly different way to better fit the needs of our project. A facade is used to access the sitemap class and we have added the ability to produce sitemap indexes as well as sitemaps. Furthermore, it's tested.

Read more about sitemaps and how to use them efficiently on [Google Webmaster Tools](https://support.google.com/webmasters/answer/156184?hl=en).

## Installation for Laravel 5.*

Simply pop the correct version constraint in your `composer.json` file and run `composer update` (however your Composer is installed).

    "watson/sitemap": "2.0.*"

Now, add the service provider to your `app/config/app.php` file.

    'Watson\Sitemap\SitemapServiceProvider'

And finally add the alias to the facade, also in `app/config/app.php`.

    'Sitemap' => 'Watson\Sitemap\Facades\Sitemap'

## Installation for Laravel 4.*

Simply pop the version constraint in your `composer.json` file and run `composer update` (hoever your Composer is installed).

    "watson/sitemap": "1.1.*"

For the documentation, have a look through [the 1.1 branch](https://github.com/dwightwatson/sitemap/tree/1.1).

## Usage

### Creating sitemap indexes
If you have a large number of links (50,000+) you will want to break your sitemaps out into seperate sitemaps with a sitemap index linking them all. You add sitemap indexes using `Sitemap::addSitemap($location, $lastModified)` and then you return the sitemap index with `Sitemap::renderSitemapIndex()`. The `$lastModified` variable will be parsed and converted to the right format for a sitemap.

Here is an example controller that produces a sitemap index.

```php
class SitemapsController extends BaseController
{
	public function index()
	{
		// Get a general sitemap.
		Sitemap::addSitemap('/sitemaps/general');

		// You can use the route helpers too.
		Sitemap::addSitemap(URL::route('sitemaps.posts'));
		Sitemap::addSitemap(route('sitemaps.users'));

		// Return the sitemap to the client.
		return Sitemap::index();
	}
}
```

Simply route to this as you usually would, `Route::get('sitemap', 'SitemapsController@index')`.

### Creating sitemaps
Similarly to sitemap indexes, you just add tags for each item in your sitemap using `Sitemap::addTag($location, $lastModified, $changeFrequency, $priority)`. You can return the sitemap with `Sitemap::renderSitemap()`. Again, the `$lastModified` variable will be parsed and convered to the right format for the sitemap.

If you'd like to just get the raw XML, simply call `Sitemap::xml()`.

Here is an example controller that produces a sitemap for blog psots.

```php
class SitemapsController extends BaseController
{
	public function posts()
	{
		$posts = Post::all();

		foreach ($posts as $post) {
			Sitemap::addTag(route('posts.show', $post), $post->updated_at, 'daily', '0.8');
		}

		return Sitemap::render();
	}
}
```

If you just want to pass a model's `updated_at` timestamp as the last modified parameter, you can simply pass the model as the second parameter and the sitemap will use that attribute automatically.

**If you're pulling a lot of records from your database you might want to consider restricting the amount of data you're getting by using the `select()` method. You can also use the `chunk()` method to only load a certain number of records at any one time as to not run out of memory.**

## Configuration

To publish the configuration file for the sitemap package, simply run this Artisan command:

    php artisan config:publish watson/sitemap
    
    php artisan vendor:publish --provider="Watson\Sitemap\SitemapServiceProvider"

Then take a look in `config/sitemap.php` to see what is available.

### Caching

By default, caching is disabled. If you would likd to enable caching, simply set `cache_enabled` in the configuration file to `true`. You can then specify how long you would like your views to be cached for. Keep in mind that when enabled, caching will affect each and every request made to the sitemap package.

### Multilingual tags

If you'd like to use a mutlilingual tag, simply pass an instance of one to the `addTag` method. Below is a crude example of how you would pass alternate tag locations for different languages.

```php
    Sitemap::addTag(new \Watson\Sitemap\Tags\MultilingualTag(
        $location,
        $lastModified,
        $changeFrequency,
        $priority,
        [
            'en' => $location . '?lang=en',
            'fr' => $location . '?lang=fr'
        ]
    ));
```
