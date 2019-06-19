<?php
namespace App\Utilities;

use Slim\Views\Twig;

class AbstractController
{
    /**
     * @var Twig
     */
    protected $twig;
    /**
     * @var Database
     */
    protected $database;

    /**
     * On demande la classe TWIG qui va nous permettre "d'appeler"
     * les vues TWIG du dossier "/templates"
     * @param Twig $twig
     * @param Database $database
     */
    public function __construct(Twig $twig, Database $database)
    {
        $this->twig = $twig;
        $this->database = $database;
    }
}
