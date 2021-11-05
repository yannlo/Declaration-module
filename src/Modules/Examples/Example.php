<?php

namespace YannLo\Basic\Modules\Examples;

use YannLo\Basic\Router\Router;
use YannLo\Basic\Framework\Module;
use Psr\Container\ContainerInterface;
use YannLo\Basic\Renderer\RendererInterface;
use YannLo\Basic\Modules\Examples\Action\ExampleAction;

class Example extends Module
{

    /**
     * MIGRATION
     *
     * migration file path
     */
    public const MIGRATION = __DIR__ . '/db/migration';

    /**
     * SEEDS
     *
     * seeds file path
     */
    public const SEEDS = __DIR__ . '/db/seeds';


    public function __construct(ContainerInterface $container)
    {
        $renderer = $container -> get(RendererInterface::class);

        $router = $container -> get(Router::class);

        $action = $container -> get(ExampleAction::class);

        $renderer -> addPath(__DIR__ . "/views", "Example");

        $router -> get("/", $action, "example.index");
        $router -> get("/{slug:[a-z0-9\-]+}-{id:[0-9]+}", $action, "example.show");
    }
}
