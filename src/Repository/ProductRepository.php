<?php
namespace App\Repository;

use App\Entity\Produit;
use App\Utilities\AbstractRepository;

class ProductRepository extends AbstractRepository
{

    /**
     * Retourne le nom de la table en base de données
     * @return string
     */
    protected function getTableName(): string
    {
        return 'produit';
    }

    /**
     * Retourne le namespace complet de l'entité
     * @return string
     */
    protected function getEntityName(): string
    {
        return Produit::class;
    }
}
