<?php

use Blog\Test\Integration\ContainerProvider;
use DevCoder\DotEnv;
use DI\ContainerBuilder;

(new DotEnv(__DIR__ . '/../.env'))->load();

require __DIR__ . '/../../vendor/autoload.php';

$builder = new ContainerBuilder();
$builder->addDefinitions(__DIR__ .  '/../../config/di.php');
(new DotEnv(__DIR__ . '/../.env'))->load();

$container = $builder->build();

ContainerProvider::setContainer($container);
