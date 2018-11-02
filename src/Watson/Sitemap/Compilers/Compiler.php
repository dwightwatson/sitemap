<?php

namespace Watson\Sitemap\Compilers;

abstract class Compiler
{
    /**
     * Google supports a maximum of 50,000 tags per page.
     *
     * @var int
     */
    const PER_PAGE = 50000;

    /**
     * Get the number of tags to offset for the page
     *
     * @param  int  $page
     * @return int
     */
    protected function getPaginationOffset(int $page): int
    {
        return ($page - 1) * static::PER_PAGE;
    }

    /**
     * Get the number of pages required by the tag definition.
     *
     * @return int
     */
    public function getPageCount($total): int
    {
        return ceil($total / static::PER_PAGE);
    }
}
