<?php

namespace Constractiv\Helena\Services\Enqueue\Script;

use Constractiv\Helena\Services\Enqueue\Script\AbstractScript;

class Script extends AbstractScript
{
    private string $handle;
    private string $src;
        private $deps = array();

    public function __construct(
        string $handle,
        string $src,
        array $deps = array()
    ) {
        $this->handle = $handle;
        $this->src = $src;
        $this->deps = $deps;
    }

    public function register(): self
    {
        \wp_register_script($this->handle, $this->src, $this->deps, self::VERSION, self::IN_FOOTER);
        return $this;
    }

    public function enqueue(): self
    {
        \wp_enqueue_script($this->handle);
        return $this;
    }

    public function localize(string $object_name, array $l10n): void
    {
        \wp_localize_script($this->handle, $object_name, $l10n);
    }
}
