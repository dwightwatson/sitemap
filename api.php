<?php

namespace DummyNamespace;

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

        $sitemap->path('contact')->changes(ChangeFrequency::NEVER);
        $sitemap->route('contact')->changes(ChangeFrequency::NEVER);

        $sitemap->add('contact')->changes(ChangeFrequency::NEVER);

        $sitemap->model(User::class, function ($user) {
            return route('users.show', $user);
        });

        $sitemap->model(Post::class)
            ->changes(ChangeFrequency::DAILY)
            ->priority(Priority::HIGHEST)
            ->scope(function ($query) {
                return $query->whereNotNull('activated_at');
            })
            ->withRoute(function ($post) {
                return route('posts.show', $post);
            });

        // Pass a query
        $sitemap->query(Post::active(), function ($post) {

        });


        // Can the sitemap infer the argument type?
        // $sitemap->add('contact', Carbon::now(), ChangeFrequency::MONTHLY, Priority::LOW);

        // $sitemap->add('contact')->justUpdated()->changedMonthly()->lowPriority();

        // $sitemap->model(Post::class, ChangeFrequency::DAILY, Priority::HIGH, function ($model) {
        //     return route('posts.show', $post->slug);
        // });

        // $sitemap->model(Post::class)->changesDaily()->highPriority()->withRoute(function ($model) {
        //     return route('posts.show', $post->slug);
        // });
    }
}
