<?php

namespace Watson\Sitemap\Compilers;

use Illuminate\Support\Collection;

class TagCompiler extends Compiler
{
    /**
     * Create a new instance of the tag compiler.
     *
     * @param  \Illuminate\Support\Collection  $definitions
     * @return void
     */
    public function __construct(Collection $definitions)
    {
        $this->definitions = $definitions;
    }

    /**
     * Get the tag definitions for the given page.
     *
     * @param  int  $page
     * @return \Illuminate\Support\Collection
     */
    public function getPage(int $page = 1): Collection
    {
        return $this->definitions->splice(
            $this->getPaginationOffset($page),
            static::PER_PAGE
        );
    }

    /**
     * Get the number of pages required by the tag definition.
     *
     * @return int
     */
    public function getPageCount(): int
    {
        return parent::getPageCount($this->definitions->count());
    }
}
