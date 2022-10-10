<?php

namespace Constractiv\Helena\Services\Config;

interface InterfaceConfig
{
    public function get(string $key): mixed;

    public function has(string $key): bool;

    public function set(string $key, string|array|callable $val): void;
}
