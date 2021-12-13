<?php

declare(strict_types=1);

use Blog\Database;

use Blog\Test\Integration\ContainerProvider;

$container = ContainerProvider::getContainer();

/** @var PDO $connection */
$connection = $container->get(Database::class)->getConnection();

$statement = $connection->prepare('DELETE FROM post WHERE title LIKE (:title)');

$title = 'Test Post 1';
$statement->bindParam(':title', $title);
$statement->execute();
