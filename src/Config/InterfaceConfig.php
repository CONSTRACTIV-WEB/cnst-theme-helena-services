<?php

namespace Constractiv\Helena\Services\Config;

interface InterfaceConfig
{
    public function get(string $key);

    public function has(string $key): bool;

    public function set(string $key, $val): void;
}
