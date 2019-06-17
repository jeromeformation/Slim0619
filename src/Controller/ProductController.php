<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController
{
    public function liste(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $response = $response->getBody()->write('<h1>Liste des produits</h1>');
        return $response;
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        // var_dump($args['id']);
        $response = $response->getBody()->write("<h1>Détail du produit {$args['id']} </h1>");
        return $response;
    }
}
