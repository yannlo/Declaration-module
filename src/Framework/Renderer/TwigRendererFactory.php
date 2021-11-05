<?php

namespace YannLo\Basic\Renderer;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Psr\Container\ContainerInterface;
use YannLo\Basic\Renderer\TwigRenderer;

class TwigRendererFactory
{
    public function __invoke(ContainerInterface $container): TwigRenderer
    {

        $path = $container->get("views.layouts_path");

        $loader  = new FilesystemLoader($path);
        $twig = new Environment($loader, [

        ]);

        $renderer = new TwigRenderer($loader, $twig);

        return $renderer;
    }
}
