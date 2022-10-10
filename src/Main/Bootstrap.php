<?php

namespace Constractiv\Helena\Services\Main;

use Constractiv\Helena\Services\Singleton\AbstractSingleton;
use Constractiv\Helena\Services\Config\Config;
use Constractiv\Helena\Services\Service\InterfaceService;

class Bootstrap extends AbstractSingleton
{
    /**
     * Autoloaded Files
     */
    protected $autoload = array(
        __DIR__ . '/helpers.php'
    );

    /**
     * Service collection
     */
    protected $services = array();
    /**
     * Config data for loading services
     */
    protected $config = array();

    /**
     * Bind config data
     *
     * @param array $config
     * @return instance
     */
    public function bindConfig(array $config): self
    {
        $this->config = new Config($config);
        return $this;
    }

    public function load()
    {
        $this->autoload();
        $this->loadServices();
    }

    public function autoload()
    {
        $this->autoload = array_merge(
            $this->autoload,
            $this->config->has('autoload') ? $this->config->get('autoload') : array()
        );
        \array_walk($this->autoload, function ($path_to_file) {
            include_once($path_to_file) ;
        });
    }

    /**
     * Load services from config data
     *
     * @return instance
     */
    public function loadServices(): self
    {
        $config = $this->config->get('services');
        \array_walk(
            $config,
            function ($data, $class) {
                $this->bindService(
                    $this->getServiceClassname($class),
                    (new $class($data))
                );
            }
        );

        return $this;
    }

    /**
     * Get Classname seperated from Namespace
     *
     * @param string $className
     * @return string
     */
    public function getServiceClassName(string $className): string
    {
        $classNameArray = explode('\\', $className);
        return array_pop($classNameArray);
    }

    /**
     * Get services by key with parameters
     *
     * @param string $key
     * @param array $parameters
     * @return mixed
     */
    public function getService(string $key, array $args = array()): mixed
    {
        if (!array_key_exists($key, $this->services)) {
            return $this;
        }

        return $this->services[$key];
    }

    /**
     * Bind service into collection.
     *
     * @param string $key
     * @return void
     */
    public function bindService(string $key, InterfaceService $service): self
    {
        if (!array_key_exists($key, $this->services)) {
            $this->services[$key] = $service;
						$this->service->register();
        }

        return $this;
    }

    /**
     * Resolves service with parameters.
     *
     * @param mixed $abstract
     * @param array $parameters
     * @return mixed
     */
    private function resolve(callable $abstract, array $args): mixed
    {
        return call_user_func_array($abstract, array( $this, $args ));
    }

    private function config(): Config
    {
        return $this->getService('config');
    }
}
