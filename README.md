Sitemap for Laravel
===================

[![Build Status](https://travis-ci.org/dwightwatson/sitemap.png?branch=master)](https://travis-ci.org/dwightwatson/sitemap)
[![Total Downloads](https://poser.pugx.org/watson/sitemap/downloads.svg)](https://packagist.org/packages/watson/sitemap)
[![Latest Stable Version](https://poser.pugx.org/watson/sitemap/v/stable.svg)](https://packagist.org/packages/watson/sitemap)
[![Latest Unstable Version](https://poser.pugx.org/watson/sitemap/v/unstable.svg)](https://packagist.org/packages/watson/sitemap)
[![License](https://poser.pugx.org/watson/sitemap/license.svg)](https://packagist.org/packages/watson/sitemap)

Sitemap is a stupidly simple package for Laravel to make building sitemaps a cinch.

Read more about sitemaps and how to use them efficiently on [Google Webmaster Tools](https://support.google.com/webmasters/answer/156184?hl=en).

## Installation

First, require the package through Composer.

```sh
composer require watson/sitemap
```

### Laravel 4.*

For Laravel 4.2 support see [the 1.1 branch](https://github.com/dwightwatson/sitemap/tree/1.1).

## Usage

### Sitemap indexes

If you have a large number of links (50,000)+ you will want to break your sitemap out into separate sitemaps and then use a sitemap index to link them all.

```php
use App\Post;
use Watson\Sitemap\Builder;

class SitemapsController extends Controller
{
    /**
     * GET /sitemaps
     *
     * @param  \Watson\Sitemap\Builder  $sitemap
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $sitemap)
    {
        // Add a general sitemap using a URL.
        $sitemap->add('sitemaps/general');

        // You can use the route helpers too.
        $sitemap->add(route('sitemaps.users'));

        // And you can provide the last modified timestamp.
        $lastModified = Post::latest()->take(1)->get();
        $sitemap->add(route('sitemaps.posts'), $lastModifieD);

        // Render the sitemap.
        return $sitemap;
    }
}
```

### Sitemaps

Similar to creating indexes, you add tags using the tag method: `$sitemap->tag($location, $lastModified, $changeFrequency, $priority)`.

```php
use App\Post;
use Watson\Sitemap\Builder;

class SitemapsController extends Controller
{
    /**
     * GET /sitemaps/posts
     *
     * @param  \Watson\Sitemap\Builder  $builder
     * @return \Illuminate\Http\Response
     */
    public function posts(Builder $sitemap)
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            $sitemap->add(route('posts.show', $post), $post->updated_at, ChangeFrequency::DAILY, 0.8);
        }

        return $sitemap;
    }
}
```

If you just want to pass a model's `updated_at` timestamp as the last modified parameter, you can simply pass the model as the second parameter and the sitemap will use that attribute automatically.

**If you're pulling a lot of records from your database you might want to consider restricting the amount of data you're getting by using the `select()` method. You can also use the `chunk()` method to only load a certain number of records at any one time as to not run out of memory.**

### Models

Instead of manually looping around, you can easily create a sitemap for a model using the `model()` method. Simply pass the model class name and a callback which generates the correct route to the resource.

```php
use App\Post;
use Watson\Sitemap\Builder;

class SitemapsController extends Controller
{
    /**
     * GET /sitemaps/posts
     *
     * @param  \Watson\Sitemap\Builder  $builder
     * @return \Illuminate\Http\Response
     */
    public function posts(Builder $sitemap)
    {
        return $sitemap->model(Post::class, function ($model) {
            return route('posts.show', $post);
        });
    }
}
```

#### Options

The last modified attribute for each model will be set using the model's `updated_at` timestamp. You can set the change frequency and priority easily as well.

```php
return $sitemap->model(Post::class, ['change_frequency' => ChangeFrequency::DAILY, 'priority' => 0.8, 'per_page' => 1000, function ($model) {
    return route('posts.show', $post); 
}]);
```

#### Pagination

By default, the sitemap will be restricted to 10,000 per page. If your resource has more than that number (or more than the number you have specified) then the `model()` method will handle this for you, 



## Caching