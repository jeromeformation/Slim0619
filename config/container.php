<?php

use App\Controller\HomeController;
use Psr\Container\ContainerInterface;
use Slim\Http\Environment;
use Slim\Http\Uri;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

// Fetch DI Container
$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function ($c) {
    $view = new Twig(
        dirname(__DIR__) . '/templates',
        [
            'cache' => false
        ]
    );

    // Instantiate and add Slim specific extension
    $router = $c->get('router');
    $uri = Uri::createFromEnvironment(new Environment($_SERVER));
    $view->addExtension(new TwigExtension($router, $uri));

    return $view;
};

// Définition de la façon d'instance HomeController
$container[HomeController::class] = function(ContainerInterface $container) {
    return new HomeController($container->get('view'));
};










