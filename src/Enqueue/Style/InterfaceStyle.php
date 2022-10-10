<?php

namespace Constractiv\Helena\Services\Enqueue\Style;

interface InterfaceStyle
{
    public function register(): self;
    public function enqueue(): self;
}
