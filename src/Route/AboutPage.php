<?php

declare(strict_types=1);

namespace Blog\Route;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment;

class AboutPage
{
    /**
     * @var Environment
     */
    private Environment $view;

    /**
     * AboutPage constructor.
     * @param Environment $view
     */
    public function __construct(Environment $view)
    {
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
    public function __invoke(Request $request, Response $response): Response
    {
        $body = $this->view->render('about.twig', [
            'name' => 'Max'
        ]);
        $response->getBody()->write($body);
        return $response;
    }
}
