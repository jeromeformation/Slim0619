<?php

namespace App\Controller;

use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AuthController extends AbstractController
{
    public function register(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'auth/register.twig');
    }
    public function connect(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'auth/connect.twig');
    }
}