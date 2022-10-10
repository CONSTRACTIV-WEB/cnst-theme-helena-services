<?php

namespace Constractiv\Helena\Services\Enqueue;

use Constractiv\Helena\Services\Service\AbstractService;

class EnqueueAdmin extends Enqueue
{
    public function register(): void
    {
        \add_action(
            'admin_enqueue_scripts',
            array($this, 'registerStyles'),
            0
        );
        \add_action(
            'admin_enqueue_scripts',
            array($this, 'registerScripts'),
            0
        );
        \add_action(
            'admin_enqueue_scripts',
            array($this, 'localizeScripts'),
            10
        );
    }
}
