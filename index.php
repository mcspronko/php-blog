<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;

require __DIR__ . '/vendor/autoload.php';

$container = new \DI\Container();

AppFactory::setContainer($container);

// Create app
$app = AppFactory::create();

// Get container
$container = $app->getContainer();

$container->set('view', function(\Psr\Container\ContainerInterface $container){
    return Twig::create('templates');
});


$app->get('/', function (Request $request, Response $response, $args) {
    return $this->get('view')->render($response, 'index.twig');
});

$app->get('/about', function (Request $request, Response $response, $args) {
    return $this->get('view')->render($response, 'about.twig', [
        'name' => 'Max'
    ]);
});

$app->run();
