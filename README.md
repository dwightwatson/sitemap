Sitemap for Laravel 4
=====================

[![Build Status](https://travis-ci.org/studioushq/sitemap.png?branch=master)](https://travis-ci.org/studioushq/sitemap)

Sitemap is a package built specifically for Laravel 4 that will help you generate XML sitemaps for Google. Based on [laravel-sitemap](https://github.com/RoumenDamianoff/laravel-sitemap) this package operates in a slightly different way to better fit the needs of our project. A facade is used to access the sitemap class and we have added the ability to produce sitemap indexes as well as sitemaps. Furthermore, it's tested.

Read more about sitemaps and how to use them efficiently on [Google Webmaster Tools](https://support.google.com/webmasters/answer/156184?hl=en).

## Installation

Simply pop this in your `composer.json` file and run `composer update` (however your Composer is installed).

```
"studious/sitemap": "dev-master"
```

Now, add the service provider to your `app/config/app.php` file.

`'Studious\Sitemap\SitemapServiceProvider'`

## Usage

### Creating sitemap indexes
If you have a large number of links (50,000+) you will want to break your sitemaps out into seperate sitemaps with a sitemap index linking them all. You add sitemap indexes using `Sitemap::addSitemap($loc, $lastmod)` and then you return the sitemap index with `Sitemap::renderSitemapIndex()`. The `$lastmod` variable will be parsed by [Carbon](https://github.com/briannesbitt/Carbon) and then converted to the right format for a sitemap.

Here is an example controller that produces a sitemap index.

```
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
		return Sitemap::renderSitemapIndex();
	}
}
```

### Creating sitemaps
Similarly to sitemap indexes, you just add tags for each item in your sitemap using `Sitemap::addTag($loc, $lastmod, $changefreq, $priority)`. You can return the sitemap with `Sitemap::renderSitemap()`. Again, the `$lastmod` variable will be parsed by [Carbon](https://github.com/briannesbitt/Carbon) and convered to the right format for the sitemap.

Here is an example controller that produces a sitemap for blog psots.

```
class SitemapsController extends BaseController
{
	pulblic function posts()
	{
		$posts = Post::all();

		foreach ($posts as $post)
		{
			Sitemap::addTag(route('posts.show', $post->id), $post->created_at, 'daily', '0.8');
		}

		return Sitemap::renderSitemap();
	}
}
```