<?php

declare(strict_types=1);

namespace Blog;

use PDO;

class LatestPosts
{
    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * LatestPosts constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param int $limit
     * @return array|null
     */
    public function get(int $limit): ?array
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM post ORDER BY published_date DESC LIMIT ' . $limit
        );

        $statement->execute();

        return $statement->fetchAll();
    }
}
