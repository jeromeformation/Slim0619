<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{
    public function home(ServerRequestInterface $request, ResponseInterface $response) {
        $response = $response->getBody()->write('<h1>Bonjour</h1>');
        return $response;
    }

    public function contact(ServerRequestInterface $request, ResponseInterface $response) {
        $response = $response->getBody()->write('<h1>Contact</h1>');
        return $response;
    }
}