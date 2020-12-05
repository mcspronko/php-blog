<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

require __DIR__ . '/vendor/autoload.php';

// Create app
$app = AppFactory::create();

$loader = new FilesystemLoader('templates');
$view = new Environment($loader);

$app->get('/', function (Request $request, Response $response, $args) use ($view) {
    $content = $view->render('index.twig');
    $response->getBody()->write($content);

    return $response;
});

$app->get('/about', function (Request $request, Response $response, $args) use ($view) {
    $content = $view->render('about.twig', [
        'name' => 'Max'
    ]);
    $response->getBody()->write($content);

    return $response;
});

$app->run();
