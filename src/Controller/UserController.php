<?php
namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class UserController extends AbstractController
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(Twig $twig, UserRepository $userRepository)
    {
        parent::__construct($twig);
        $this->userRepository = $userRepository;
    }

    /**
     * Page de la liste des produits
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function liste(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $users = $this->userRepository->findAll();

        // On renvoie les produits à la vue
        return $this->twig->render($response, 'users/list.twig', [
            'users' => $users
        ]);
    }

    /**
     * Affichage du détail du produit
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id'];

        // Requête SQL
        $query = "SELECT * FROM produit WHERE id = ? AND etat_publication = 1";
        $product = $this->database->queryPrepared($query, [$id], Produit::class);

        // On teste si un produit a été retourné
        if (empty($product)) {
            // Page d'erreur 404
            return $this->twig
                ->render($response, 'errors/error404.twig')
                ->withStatus(404)
            ;
        }


        return $this->twig->render($response, 'product/show.twig');
    }
}
