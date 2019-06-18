<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class HomeController
{
    /**
     * @var Twig
     */
    private $twig;

    /**
     * On demande la classe TWIG qui va nous permettre "d'appeler"
     * les vues TWIG dans le dossier "/templates"
     * @param Twig $twig
     */
    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function home(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'index.twig');
    }

    public function contact(ServerRequestInterface $request, ResponseInterface $response)
    {
        $response = $response->getBody()->write('<h1>Contact</h1>');
        return $response;
    }
}