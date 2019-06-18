<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Utilities\AbstractController;
use App\Utilities\Database;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController extends AbstractController
{
    public function liste(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        // Connexion à la BDD
        $database = new Database();
        // Requête SQL
        $query = "SELECT * FROM produit WHERE etat_publication = 1";
        // Exécution de la requête SQL et récupération des produits
        $products = $database->query($query, Produit::class);
        // On renvoie les produits à la vue
        return $this->twig->render($response, 'product/list.twig', [
            'products' => $products
        ]);
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        // var_dump($args['id']);
        return $this->twig->render($response, 'product/show.twig');
    }
}
