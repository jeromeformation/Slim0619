<?php

use App\Controller\APIController;
use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Controller\UserController;

// Création de pages de base
$app->get('/', HomeController::class . ':home');
$app->get('/contact', HomeController::class . ':contact');

// Renvoi d'un JSON
$app->get('/hamac', APIController::class . ':hamac');

// Création d'un groupe de routes gérants les produits
$app->group('/produit', function () {
    // Page de la liste des produits
    $this->get('/liste', ProductController::class . ':liste');
    // Création d'une route possédant une variable
    $this->get('/{id:\d+}', ProductController::class . ':show');
    // Page de modification des produits
    // todo : créer route et méthode de contrôleur
    // Page de suppression des produits
    // todo : créer route et méthode de contrôleur
});
// Création d'un groupe de routes gérants les produits
$app->group('/utilisateurs', function () {
    // Page de la liste des produits
    $this->get('/liste', UserController::class . ':liste');
});

// Page d'inscription
$app->map(['GET', 'POST'], '/inscription', AuthController::class . ':register');
// Page de connexion
$app->get('/connexion', AuthController::class . ':connect');
