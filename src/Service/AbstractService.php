<?php

namespace Constractiv\Helena\Services\Service;

use Constractiv\Helena\Services\Service\InterfaceService;
use Constractiv\Helena\Services\Config\Config;

abstract class AbstractService implements InterfaceService
{
    protected Config $config;

    public function __construct(array $data)
    {
        $this->config = new Config($data);
    }

    abstract public function register(): void;
}
