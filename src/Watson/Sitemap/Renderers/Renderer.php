<?php

namespace Watson\Sitemap\Renderers;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\{Renderable, Responsable};

abstract class Renderer implements Renderable, Responsable
{
    /**
     * The tag definitions.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $tags;

    /**
     * Create a new sitemap instance.
     *
     * @param  \Illuminate\Support\Collection  $tags
     */
    public function __construct(Collection $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function render()
    {
        return view(
            static::VIEW,
            ['tags' => $this->tags]
        );
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return response()->make(
            $this->render(),
            200,
            ['Content-Type' => 'text/xml']
        );
    }
}
