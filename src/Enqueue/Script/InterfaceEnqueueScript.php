<?php

namespace Constractiv\Helena\Services\Enqueue\Script;

interface InterfaceScript
{
    private function register(): self;
    private function enqueue(): self;
}
