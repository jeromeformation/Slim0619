<?php

use App\Controller\ProductController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Response;

// Création d'une route
$app->get('/homepage', function (ServerRequestInterface $request, ResponseInterface $response) {
    $response = $response->getBody()->write('<h1>Bonjour</h1>');
    return $response;
});

$app->get('/contact', function (ServerRequestInterface $request, ResponseInterface $response) {
    $response = $response->getBody()->write('<h1>Contact</h1>');
    return $response;
});

$app->get('/hamac', function (ServerRequestInterface $request, Response $response) {
    // Création des données
    $hamac = [
        "name" => "Hamac",
        "description" => "Pour dormir APRES Slim (pas pendant... ;))"
    ];
    // On met les données dans la réponse (en précisant que ce doit être du JSON)
    $response = $response->withJson($hamac);
    // On retourne la réponse au navigateur
    return $response;
});


$app->group('/produit', function () {
    // Page de la liste des produits
    $this->get('/liste', ProductController::class . ':liste');
    // Création d'une route possédant une variable
    $this->get('/{id:\d+}', ProductController::class . ':show');
    // Page de modification des produits
    // todo : créer route et contrôleurs
    // Page de suppression des produits
    // todo : créer route et contrôleurs
});
