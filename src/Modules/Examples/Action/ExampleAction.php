<?php

namespace YannLo\Basic\Modules\Examples\Action;

use GuzzleHttp\Psr7\Response;
use YannLo\Basic\Router\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use YannLo\Basic\Renderer\RendererInterface;

class ExampleAction implements MiddlewareInterface
{
    use \YannLo\Basic\Modules\Tools\ExtractPageTrait;

    public function __construct(private \PDO $pdo, private RendererInterface $renderer)
    {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $routeName = $request ->getAttribute("routeName");

        $page = $this -> extractPageOnRouteName($routeName);

        return $this -> $page();
    }

    private function index(): ResponseInterface
    {
        return new Response(body: $this->renderer->render("@Example/index"));
    }

    private function show(): ResponseInterface
    {
        return new Response(body: $this->renderer->render("@Example/show"));
    }
}
