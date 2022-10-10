<?php

namespace Constractiv\Helena\Services\Enqueue\Script;

abstract class AbstractScript implements InterfaceScript
{
    /**
     * Load scripts in footer
     * @var boolean
     */
    public const IN_FOOTER = true;

    /**
     * Remove Versions ins Script (Security)
     */
    public const VERSION = null;

    abstract public function register(): self;
    abstract public function enqueue(): self;
}
