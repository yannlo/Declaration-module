<?php
require dirname(__DIR__)."/vendor/autoload.php";

use DI\ContainerBuilder;
use YannLo\Basic\Framework\App;

use function Http\Response\send;
use GuzzleHttp\Psr7\ServerRequest;

use YannLo\Basic\Modules\Errors\Error;
use YannLo\Basic\Modules\Declarations\Declaration;

use YannLo\Basic\Middlewares\ControlMatching;

$modules =[
    Error::class,
    Declaration::class
    // modules name here
];


$builder = new ContainerBuilder();

$builder -> addDefinitions(dirname(__DIR__)."/config/config.php");

foreach($modules as $module)
{
    if($module::DEFINITIONS)
    {
        $builder -> addDefinitions($module::DEFINITIONS);
    }
}
unset($module);

$container = $builder ->build();

$app = new App($container,$modules);

/**
 * pipe middleware in app
 */
 $app->pipe(ControlMatching::class); 

if (php_sapi_name() !== 'cli') {
    $request  = ServerRequest::fromGlobals();
    send($app->handle($request));
}