<?php

declare(strict_types=1);

namespace Blog\Test\Integration;

use Blog\Database;
use Blog\LatestPosts;
use PHPUnit\Framework\TestCase;

class LatestPostsTest extends TestCase
{
    private LatestPosts $latestPosts;

    protected function setUp(): void
    {
        $container = ContainerProvider::getContainer();

        $this->latestPosts = new LatestPosts($container->get(Database::class));
    }

    public static function setUpBeforeClass(): void
    {
        require_once 'delete_latest_posts.php';
        require_once 'create_latest_posts.php';
        fwrite(STDERR, print_r('Created Test Post 1', TRUE));
    }

    public function testGet(): void
    {
        $posts = $this->latestPosts->get(7);

        $testPost = null;
        foreach ($posts as $post) {
            if ($post['title'] === 'Test Post 1') {
                $testPost = $post;
            }
        }

        $this->assertNotNull($testPost);
        $this->assertEquals('test-post-1', $testPost['url_key']);
    }

    public static function tearDownAfterClass(): void
    {
        require_once 'delete_latest_posts.php';
        fwrite(STDERR, print_r('Deleted Test Post 1', TRUE));
    }
}
