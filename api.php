<?php

namespace DummyNamespace;

use Watson\Sitemap\{ChangeFrequency, Priority};
use Watson\Sitemap\SitemapServiceProvider as ServiceProvider;

class SitemapServiceProvider extends ServiceProvider
{
    /**
     * Define your sitemap models and tags.
     *
     * @param  \Watson\Sitemap\Builder  $sitemap
     * @return void
     */
    public function boot(Builder $sitemap)
    {
        parent::boot($sitemap);

        $sitemap->add('contact')->changes(ChangeFrequency::NEVER);
        $sitemap->path('contact')->changes(ChangeFrequency::NEVER); // alias for add
        $sitemap->route('contact')->changes(ChangeFrequency::NEVER);

        $sitemap->add('contact')->modified(now()->subDays(2));

        $sitemap->model(User::class)->withRoute(function ($user) {
            return route('users.show', $user);
        });

        $sitemap->model(Post::whereNotNull('activated_at'))
            ->changes(ChangeFrequency::DAILY)
            ->priority(Priority::HIGHEST)
            ->withRoute(function ($post) {
                return route('posts.show', $post);
            });
    }
}
