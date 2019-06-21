<?php
namespace App\Repository;

use App\Entity\User;
use App\Utilities\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function insert(User $user)
    {
        // Préparation de la requête SQL
        $sql = "INSERT INTO app_user (username, email, password, role)
            VALUES (?, ?, ?, ?)";

        // Hashage du password
        $user->hashPassword();

        // Récupération des données postées
        $datas = [
          $user->getUsername(),
          $user->getEmail(),
          $user->getPassword(),
          $user->getRole()
        ];

        // Envoi de la requête à la BDD
        return $this->database->queryPrepared(htmlentities($sql, ENT_QUOTES), $datas);
    }

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
