<?php

declare(strict_types=1);

use Blog\Database;
use Blog\Test\Integration\ContainerProvider;

$container = ContainerProvider::getContainer();

/** @var PDO $connection */
$connection = $container->get(Database::class)->getConnection();

$statement = $connection->prepare('INSERT INTO post (title, description, url_key, published_date) VALUES (:title, :description, :url_key, :published_date)');

$statement->execute([
    ':title' => 'Test Post 1',
    ':description' => 'Test Description 1',
    ':url_key' => 'test-post-1',
    ':published_date' => date('Y-m-d H:i:s')
]);
