<?php

namespace Watson\Sitemap\Controllers;

class SitemapController
{
    public function __construct(Request $request, Compiler $compiler)
    {
        $this->request = $request;
        $this->compiler = $compiler;
    }

    public function __invoke()
    {
        //
    }
}
