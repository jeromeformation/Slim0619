<?php
namespace App\Repository;

use App\Entity\User;
use App\Utilities\AbstractRepository;

class UserRepository extends AbstractRepository
{
    /**
     * Retourne le nom de la table en base de données
     * @return string
     */
    protected function getTableName(): string
    {
        return 'app_user';
    }

    /**
     * Retourne le namespace complet de l'entité
     * @return string
     */
    protected function getEntityName(): string
    {
        return User::class;
    }
}
