<?php

declare(strict_types=1);

use Blog\Database;
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/../.env'))->load();

$database = new Database(
    getenv('DATABASE_DSN'),
    getenv('DATABASE_USERNAME'),
    getenv('DATABASE_PASSWORD')
);

$connection = $database->getConnection();

$statement = $connection->prepare('INSERT INTO post (title, description, url_key, published_date) VALUES (:title, :description, :url_key, :published_date)');

$statement->execute([
    ':title' => 'Test Post 1',
    ':description' => 'Test Description 1',
    ':url_key' => 'test-post-1',
    ':published_date' => date('Y-m-d H:i:s')
]);
