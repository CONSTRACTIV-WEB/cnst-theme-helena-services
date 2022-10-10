<?php

namespace Constractiv\Helena\Services\Lib\Enqueue;

use Constractiv\Helena\Services\Enqueue\Script\AbstractScript;

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

    abstract private function register(): self;
    abstract private function enqueue(): self;
}
