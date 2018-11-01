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
     * The registrar instance.
     *
     * @var \Watson\Sitemap\Registrar
     */
    protected $registrar;

    /**
     * Create a new compiler instance.
     *
     * @param  \Watson\Sitemap\Registrar  $registrar
     * @return void
     */
    public function __construct(Registrar $registrar)
    {
        $this->registrar = $registrar;
    }

    /**
     *
     *
     */
    public function requiesIndex()
    {
        $count = $this->builder->getTagDefinitions()->count();

        if ($count > static::PER_PAGE) {
            return true;
        }
    }
}
