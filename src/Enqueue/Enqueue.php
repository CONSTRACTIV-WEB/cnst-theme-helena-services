<?php

namespace Constractiv\Helena\Services\Enqueue;

use Constractiv\Helena\Services\Service\AbstractService;
use Constractiv\Helena\Services\Enqueue\Style\Style;
use Constractiv\Helena\Services\Enqueue\Script\Script;

class Enqueue extends AbstractService
{
    private array $registeredScripts = array();
    private array $registeredStyles = array();

    public function registerStyles(): void
    {
        if (!$this->config->has('styles')) {
            return;
        }

        \array_walk($this->config->get('styles'), function ($style) {
            $this->registeredScripts['styles'][] = new Style(
                $style['handle'],
                $style['src'],
                $style['deps'],
                $style['media']
            );
        });
    }

    public function registerScripts(): void
    {
        if (!$this->config->has('styles')) {
            return;
        }

        \array_walk($this->config->get('scripts'), function ($script) {
            $this->registeredScripts[$script['handle']] = (new Script(
                $script['handle'],
                $script['src'],
                $script['deps'],
            ))->register()->enqueue();
        });
    }

    public function localizeScripts(): void
    {
        if (!$this->config->has('localize')) {
            return;
        }

        /*\array_walk($this->config->get('localize'), function ($key, $objects) {
            if (array_key_exists($key, $this->registeredScripts)) {
                foreach ($objects as $object_name, $l10n) {
                    $this->registeredScripts[$key]->localize($object_name, $l10n);
                }
            }
        });*/
    }
}
}
