<?php

namespace Constractiv\Helena\Services\Enqueue\Style;

use Constractiv\Helena\Services\Enqueue\AbstractStyle;

class Style extends AbstractStyle
{
    public function __construct(
        private string $handle,
        private string $src,
        private $deps = array(),
        private string $media = 'all'
    ) {
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
