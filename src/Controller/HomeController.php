<?php

namespace App\Controller;

use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends AbstractController
{
    public function home(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'index.twig');
    }

    public function contact(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'contact.twig');
    }
}
