<?php

namespace Constractiv\Helena\Services\Enqueue\Script;

interface InterfaceScript
{
    public function register(): self;
    public function enqueue(): self;
}
