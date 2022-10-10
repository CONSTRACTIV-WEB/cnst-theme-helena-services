<?php

namespace Constractiv\Helena\Services\Enqueue\Style;

use Constractiv\Helena\Services\Enqueue\Style\InterfaceStyle;

abstract class AbstractStyle implements InterfaceStyle
{
    /**
     * Remove Versions ins Script (Security)
     */
    public const VERSION = null;

    abstract private function register(): self;
    abstract private function enqueue(): self;
}
