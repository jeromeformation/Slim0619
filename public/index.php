<?php
// Récupération de l'autoloader créé par composer
require dirname(__DIR__) . '/vendor/autoload.php';

// Les "use" des différentes classes
use Slim\App;

// Config
$config = require dirname(__DIR__) . '/config/config.php';

// On créé l'application Slim
$app = new App($config);

// Récupération du conteneur
require dirname(__DIR__) . '/config/container.php';

// Récupération des routes
require dirname(__DIR__) . '/config/routes.php';

// Renvoi de la réponse au navigateur
$app->run();

