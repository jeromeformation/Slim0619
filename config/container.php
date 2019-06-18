<?php

use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\ProductController;
use Psr\Container\ContainerInterface;
use Slim\Http\Environment;
use Slim\Http\Uri;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Twig\Extension\DebugExtension;

// Fetch DI Container
$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function (ContainerInterface $c) {
    $view = new Twig(
        dirname(__DIR__) . '/templates',
        [
            'cache' => false,
            'debug' => true
        ]
    );

    // Récupération du routeur
    $router = $c->get('router');
    $uri = Uri::createFromEnvironment(new Environment($_SERVER));
    // Ajout d'extensions
    $view->addExtension(new TwigExtension($router, $uri));
    $view->addExtension(new DebugExtension());
    // Ajout de variables globales
    $view->getEnvironment()->addGlobal('session', $_SESSION);

    return $view;
};

// Définition de la façon d'instance HomeController
$container[HomeController::class] = function(ContainerInterface $container) {
    return new HomeController($container->get('view'));
};
$container[ProductController::class] = function(ContainerInterface $container) {
    return new ProductController($container->get('view'));
};
$container[AuthController::class] = function(ContainerInterface $container) {
    return new AuthController($container->get('view'));
};
