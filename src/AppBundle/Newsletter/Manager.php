<?php

namespace AppBundle\Newsletter;

use Symfony\Component\Templating\EngineInterface;

/**
 * Dummy Newsletter manager class
 */
class Manager
{
    private $templating;

    public function __construct(EngineInterface $templating = null)
    {
        $this->templating = $templating;
    }

    public function getTemplating()
    {
        return $this->templating;
    }
}
