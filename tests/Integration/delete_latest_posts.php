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

$statement = $connection->prepare('DELETE FROM post WHERE title = :title');

$statement->execute([
    ':title' => 'Test Post 1',
]);
