<?php
namespace App\Utilities;

abstract class AbstractRepository
{
    /**
     * @var Database
     */
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * Récupère tous les enregistrements de la table définie
     * @return array
     */
    public function findAll(): array
    {
        // Requête SQL
        $query = "SELECT * FROM " . $this->getTableName();
        // Exécution de la requête SQL et récupération des produits
        return $this->database->query($query, $this->getEntityName());
    }

    /**
     * Retourne le nom de la table en base de données
     * @return string
     */
    abstract protected function getTableName(): string;

    /**
     * Retourne le namespace complet de l'entité
     * @return string
     */
    abstract protected function getEntityName(): string;
}
