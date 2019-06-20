<?php
namespace App\Repository;

use App\Entity\User;
use App\Utilities\Database;

class UserRepository
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
        $query = "SELECT * FROM app_user";
        // Exécution de la requête SQL et récupération des produits
        return $this->database->query($query, User::class);
    }
}
