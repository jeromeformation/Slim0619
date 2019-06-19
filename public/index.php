<?php
// Récupération de l'autoloader créé par composer
require dirname(__DIR__) . '/vendor/autoload.php';

// Les "use" des différentes classes
use DI\ContainerBuilder;
use Slim\App;

session_start();

// Config
$config = require dirname(__DIR__) . '/config/config.php';

// PHP-DI
$builder = new DI\ContainerBuilder();
$builder->addDefinitions(dirname(__DIR__) . '/config/container.php');
$container = $builder->build();

// On créé l'application Slim
$app = new App($container);

// Récupération des routes
require dirname(__DIR__) . '/config/routes.php';

// Renvoi de la réponse au navigateur
$app->run();
