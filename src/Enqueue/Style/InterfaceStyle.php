<?php

namespace Constractiv\Helena\Services\Enqueue\Style;

interface InterfaceStyle
{
    private function register(): self;
    private function enqueue(): self;
}
