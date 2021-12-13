<?php

declare(strict_types=1);

namespace Blog\Route;

use Blog\PostMapper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment;

class BlogPage
{
    /**
     * @var Environment
     */
    private Environment $view;

    /**
     * @var PostMapper
     */
    private PostMapper $postMapper;

    /**
     * BlogPage constructor.
     * @param Environment $view
     * @param PostMapper $postMapper
     */
    public function __construct(Environment $view, PostMapper $postMapper)
    {
        $this->view = $view;
        $this->postMapper = $postMapper;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Request $request, Response $response, $args): Response
    {
        $page = isset($args['page']) ? (int) $args['page'] : 1;
        $limit = 2;

        $posts = $this->postMapper->getList($page, $limit, 'DESC');

        $totalCount = $this->postMapper->getTotalCount();
        $body = $this->view->render('blog.twig', [
            'posts' => $posts,
            'pagination' => [
                'current' => $page,
                'paging' => ceil($totalCount / $limit),
            ],
        ]);
        $response->getBody()->write($body);
        return $response;
    }
}
