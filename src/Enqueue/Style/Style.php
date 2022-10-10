<?php

namespace Constractiv\Helena\Services\Enqueue\Style;

use Constractiv\Helena\Services\Enqueue\AbstractStyle;

class Style extends AbstractStyle
{
    private string $handle;
    private string $src;
    private array $deps = array();

    public function __construct(
        string $handle,
        string $src,
        array $deps = array(),
        string $media = 'all'
    ) {
        $this->handle = $handle;
        $this->src = $src;
        $this->deps = $deps;
        $this->media = $media;
    }

    public function register(): self
    {
        \wp_register_style($this->handle, $this->src, $this->deps, self::VERSION, $this->media);
        return $this;
    }

    public function enqueue(): self
    {
        \wp_enqueue_style($this->handle);
        return $this;
    }
}
