<?php

namespace Watson\Sitemap;

use Illuminate\Support\Collection;
use Watson\Sitemap\Definitions\ModelDefinition;

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
     * Get the registrar instance.
     *
     * @return \Watson\Sitemap\Registrar
     */
    public function getRegistrar(): Registrar
    {
        return $this->registrar;
    }

    public function getIndexTags(): Collection
    {
        $tags = collect();

        $tags->push(new \Watson\Sitemap\Definitions\SitemapDefinition('/foo', 'foo'));

        return $tags;
    }

    public function getTags(int $page = 1): Collection
    {
        //
    }

    /**
     * Get the number of pages required for the tag definitions.
     *
     * @return int
     */
    public function getTagPageCount(): int
    {
        $definitions = $this->registrar->getTagDefinitions();

        return ceil($definitions->count() / static::PER_PAGE);
    }

    /**
     * Get the number of pages required for the model definiiton.
     *
     * @param  \Watson\Sitemap\Definitions\ModelDefinition  $definition
     * @return int
     */
    public function getModelPageCount(ModelDefinition $definition): int
    {
        $total = $definition->getQuery()->count();

        return ceil($total / statiC::PER_PAGE);
    }
}
