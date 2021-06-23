<?php

declare(strict_types=1);

namespace Blog;

class LatestPosts
{
    /**
     * @var Database
     */
    private Database $database;

    /**
     * LatestPosts constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * @param int $limit
     * @return array|null
     */
    public function get(int $limit): ?array
    {
        $statement = $this->database->getConnection()->prepare(
            'SELECT * FROM post ORDER BY published_date DESC LIMIT ' . $limit
        );

        $statement->execute();

        return $statement->fetchAll();
    }
}
