<?php

namespace Constractiv\Helena\Services\Enqueue;

use Constractiv\Helena\Services\Service\AbstractService;
use Constractiv\Helena\Services\Enqueue\Style\Style;
use Constractiv\Helena\Services\Enqueue\Script\Script;

abstract class Enqueue extends AbstractService
{
    private array $registeredScripts = array();
    private array $registeredStyles = array();

    public function registerStyles(): void
    {
        if (!$this->config->has('styles')) {
            return;
        }

        $styles = $this->config->get('styles');

        \array_walk($styles, function ($style) {
            $this->registeredScripts['styles'][] = new Style(
                $style['handle'],
                $style['src'],
                $style['deps'],
                isset($style['media']) ?? $style['media']
            );
        });
    }

    public function registerScripts(): void
    {
        if (!$this->config->has('styles')) {
            return;
        }

        $scripts = $this->config->get('scripts');

        \array_walk($scripts, function ($script) {
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
