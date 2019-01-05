<?php

namespace Watson\Sitemap\Http;

use Illuminate\Support\Collection;
use Illuminate\Http\Request as BaseRequest;

class Request
{
    /**
     * Create a new instance of a sitemap request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(BaseRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Whether the request is for the sitemap index.
     *
     * @return bool
     */
    public function wantsIndex(): bool
    {
        return $this->request->is('sitemaps');
    }

    /**
     * Whether the request is for the sitemap tags.
     *
     * @return bool
     */
    public function wantsTags(): bool
    {
        return $this->request->is('sitemaps/general');
    }

    /**
     * Get the model the request is after.
     *
     * @param  \Illuminate\Support\Collection  $models
     * @return string
     */
    public function wantsModel(Collection $models): ?string
    {
        return $this->request->is($models);
    }

    /**
     * Get the pagination page.
     *
     * @return int
     */
    public function page(): int
    {
        return $this->request->input('page', 1);
    }
}
