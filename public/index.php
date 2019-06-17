<?php
// Récupération de l'autoloader créé par composer
require dirname(__DIR__) . '/vendor/autoload.php';
// Les "use" des différentes classes
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Http\Response;

// Config
$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ]
];

// On créé l'application Slim
$app = new App($config);

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

// Page de la liste des produits
$app->get(
    '/produit/liste',
    function(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ) {
        $response = $response->getBody()->write(
            '<h1>Liste des produits</h1>'
        );
        return $response;
    }
);
// Création d'une route possédant une variable
$app->get(
    '/produit/{id:\d+}',
    function(ServerRequestInterface $request, ResponseInterface $response, array $args) {
        // var_dump($args['id']);
        $response = $response->getBody()->write(
            "<h1>Détail du produit {$args['id']} </h1>"
        );
        return $response;
    }
);


// Renvoi de la réponse au navigateur
$app->run();

