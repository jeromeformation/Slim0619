<?php
// Récupération de l'autoloader créé par composer
require dirname(__DIR__) . '/vendor/autoload.php';
// Les "use" des différentes classes
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

// On créé l'application Slim
$app = new App();

// Création d'une route
$app->get('/homepage', function (ServerRequestInterface $request, ResponseInterface $response)
{
    $response = $response->getBody()->write('<h1>Bonjour</h1>');
    return $response;
});

// Renvoi de la réponse au navigateur
$app->run();

