<?php

namespace Constractiv\Helena\Services\Enqueue;

use Constractiv\Helena\Services\Service\AbstractService;

class EnqueueFrontend extends Enqueue
{
    public function register(): void
    {
        \add_action(
            'wp_enqueue_scripts',
            array($this, 'registerStyles'),
            0
        );
        \add_action(
            'wp_enqueue_scripts',
            array($this, 'registerScripts'),
            0
        );
        \add_action(
            'wp_enqueue_scripts',
            array($this, 'localizeScripts'),
            10
        );
    }
}
