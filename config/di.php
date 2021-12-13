<?php

use Blog\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use function DI\autowire;
use function DI\get;

return [
    Environment::class => autowire()
        ->constructorParameter('loader', get(FilesystemLoader::class)),

    FilesystemLoader::class => autowire()
        ->constructorParameter('paths', 'templates'),

    Database::class => autowire()
        ->constructorParameter('dsn', getenv('DATABASE_DSN'))
        ->constructorParameter('username', getenv('DATABASE_USERNAME'))
        ->constructorParameter('password', getenv('DATABASE_PASSWORD'))
];
