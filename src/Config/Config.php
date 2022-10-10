<?php

namespace Constractiv\Helena\Services\Config;

use Constractiv\Helena\Services\Config\InterfaceConfig;

class Config implements InterfaceConfig
{
    /**
     * Config items
     */
    private $items = array();

    /**
     * Overwrite existing items
     * @return void
     */
    public function __construct(array $_items)
    {
        $this->items = $_items;
    }

    /**
     * Set specific item by key
     * @return void
     */
    public function set(string $key, $val): void
    {
        $this->items[$key] = $val;
    }

    /**
     * Get specific item by key
     * @return array
     */
    public function get(string $key): array
    {
        if (!$this->has($key)) {
            return $this;
        }

        return $this->items[$key];
    }

    /**
     * Check if Config item has key
     * @return bool
     */
    public function has(string $key): bool
    {
        return \array_key_exists($key, $this->items);
    }

    /**
     * Returns all Config items
     * @return array
     */
    public function all(): array
    {
        return $this->items;
    }
}
