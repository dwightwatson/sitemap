<?php

namespace Watson\Sitemap\Compilers;

use Watson\Sitemap\Registrar;

class IndexCompiler extends Compiler
{
    /**
     * Create a new instance of the index compiler.
     *
     * @param  \Watson\Sitemap\Registrar  $registrar
     * @return void
     */
    public function __construct(Registrar $registrar)
    {
        $this->registrar = $registrar;
    }

    public function render()
    {
        $this->getTagPages();

        $this->getModelPages();


    }
}
