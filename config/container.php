<?php

use App\Utilities\Database;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\CallableResolver;
use Slim\Handlers\Error;
use Slim\Handlers\NotAllowed;
use Slim\Handlers\PhpError;
use Slim\Handlers\Strategies\RequestResponse;
use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Uri;
use Slim\Router;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Twig\Extension\DebugExtension;

return [
    'settings' => [
        'httpVersion' => '1.1',
        'responseChunkSize' => 4096,
        'outputBuffering' => 'append',
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        'addContentLengthHeader' => true,
        'routerCacheFile' => false,
    ],
    'environment' => function () {
        return new Environment($_SERVER);
    },
    'request' => function (ContainerInterface $container) {
        return Request::createFromEnvironment($container->get('environment'));
    },
    'response' => function (ContainerInterface $container) {
        $headers = new Headers(['Content-Type' => 'text/html; charset=UTF-8']);
        $response = new Response(200, $headers);

        return $response->withProtocolVersion($container->get('settings')['httpVersion']);
    },
    'router' => function (ContainerInterface $container) {
        $routerCacheFile = false;
        if (isset($container->get('settings')['routerCacheFile'])) {
            $routerCacheFile = $container->get('settings')['routerCacheFile'];
        }
        $router = (new Router)->setCacheFile($routerCacheFile);
        if (method_exists($router, 'setContainer')) {
            $router->setContainer($container);
        }
        return $router;
    },
    'foundHandler' => function () {
        return new RequestResponse;
    },
    'phpErrorHandler' => function (ContainerInterface $container) {
        return new PhpError($container->get('settings')['displayErrorDetails']);
    },
    'errorHandler' => function (ContainerInterface $container) {
        return new Error(
            $container->get('settings')['displayErrorDetails']
        );
    },
    'notFoundHandler' => function (ContainerInterface $container) {
        return function (ServerRequestInterface $request, ResponseInterface $response) use ($container) {
            return $container->get(Twig::class)
                ->render($response, 'errors/error404.twig')
                ->withStatus(404);
        };
    },
    'notAllowedHandler' => function () {
        return new NotAllowed;
    },
    'callableResolver' => function (ContainerInterface $container) {
        return new CallableResolver($container);
    },
    'view' => function (ContainerInterface $c) {
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
    },
    Twig::class => function (ContainerInterface $container) {
        return $container->get('view');
    },
    Database::class => function (ContainerInterface $container) {
        $parameters = $container->get('parameters');
        return new Database(
            $parameters['database_name'],
            $parameters['database_user'],
            $parameters['database_host'],
            $parameters['database_password']
        );
    }
];
