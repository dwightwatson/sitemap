<?php

namespace Watson\Sitemap\Http;

use Illuminate\Support\Collection;
use Illuminate\Http\Request as BaseRequest;

class Request extends BaseRequest
{
    /**
     * Whether the request is for the sitemap index.
     *
     * @return bool
     */
    public function wantsIndex(): bool
    {
        return $this->is('sitemaps');
    }

    /**
     * Whether the request is for the sitemap tags.
     *
     * @return bool
     */
    public function wantsTags(): bool
    {
        return $this->is('sitemaps/general');
    }

    /**
     * Get the model the request is after.
     *
     * @param  \Illuminate\Support\Collection  $models
     * @return string
     */
    public function wantsModel(Collection $models): ?string
    {
        return $this->is($models);
    }

    /**
     * Get the pagination page.
     *
     * @return int
     */
    public function page(): int
    {
        return $this->input('page', 1);
    }
}
