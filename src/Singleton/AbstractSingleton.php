<?php

namespace Constractiv\Helena\Services\Singleton;

use Constractiv\Helena\Services\Singleton\SingletonInterface;

abstract class AbstractSingleton implements SingletonInterface
{
    /**
     * @var Library the reference to Singleton instance of this class
     */
    protected static $instance;

    /**
     * Returns the Singleton instance of this class
     */
    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    public function __wakeup()
    {
    }
}
