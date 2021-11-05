<?php

namespace YannLo\Basic\Modules\Errors;

use YannLo\Basic\Framework\Module;
use YannLo\Basic\Renderer\RendererInterface;

class Error extends Module
{
    public function __construct(RendererInterface $renderer)
    {
        $renderer -> addPath(__DIR__ . '/views', "Error");
    }
}
