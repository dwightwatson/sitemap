<?php

namespace Watson\Sitemap;

class Compiler
{
    /**
     * Google supports a maximum of 50,000 tags per page.
     *
     * @var int
     */
    const PER_PAGE = 50000;

    /**
     * The builder instance.
     *
     * @var \Watson\Sitemap\Builder
     */
    protected $builder;

    /**
     * Create a new compiler instance.
     *
     * @param  \Watson\Sitemap\Builder  $builder
     * @return void
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     *
    public function requiesIndex()
    {
        $count = $this->builder->getTagDefinitions()->count();

        if ($count > static::PER_PAGE) {
            return true;
        }
    }
}
