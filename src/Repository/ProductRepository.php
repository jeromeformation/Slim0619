<?php
namespace App\Repository;

use App\Entity\Produit;
use App\Utilities\Database;

class ProductRepository
{
    /**
     * @var Database
     */
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * Récupère tous les enregistrements
     * ... de la table produit
     * @return array
     */
    public function findAll(): array
    {
        // Requête SQL
        $query = "SELECT * FROM produit";
        // Exécution de la requête SQL et récupération des produits
        return $this->database->query($query, Produit::class);
    }
}
