<?php

declare(strict_types=1);

namespace Blog\Route;

use Blog\LatestPosts;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment;

class HomePage
{
    /**
     * @var LatestPosts
     */
    private LatestPosts $latestPosts;

    /**
     * @var Environment
     */
    private Environment $view;

    /**
     * HomePage constructor.
     * @param LatestPosts $latestPosts
     * @param Environment $view
     */
    public function __construct(LatestPosts $latestPosts, Environment $view)
    {
        $this->latestPosts = $latestPosts;
        $this->view = $view;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function execute(Request $request, Response $response): Response
    {
        $posts = $this->latestPosts->get(3);

        $body = $this->view->render('index.twig', [
            'posts' => $posts
        ]);
        $response->getBody()->write($body);
        return $response;
    }
}
