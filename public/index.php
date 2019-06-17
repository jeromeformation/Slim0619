<?php
// Récupération de l'autoloader créé par composer
require dirname(__DIR__) . '/vendor/autoload.php';
// Les "use" des différentes classes
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Http\Response;

// On créé l'application Slim
$app = new App();

// Création d'une route
$app->get('/homepage', function (ServerRequestInterface $request, ResponseInterface $response)
{
    $response = $response->getBody()->write('<h1>Bonjour</h1>');
    return $response;
});

$app->get('/contact', function (ServerRequestInterface $request, ResponseInterface $response)
{
    $response = $response->getBody()->write('<h1>Contact</h1>');
    return $response;
});

$app->get('/hamac', function (ServerRequestInterface $request, Response $response)
{
    $hamac = [
        "name" => "Hamac",
        "description" => "Pour dormir APRES Slim"
    ];

    $response = $response->withJson($hamac);
    return $response;
});

// Renvoi de la réponse au navigateur
$app->run();

