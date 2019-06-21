<?php
namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProductRepository;
use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class ProductController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(Twig $twig, ProductRepository $productRepository)
    {
        parent::__construct($twig);
        $this->productRepository = $productRepository;
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
        $products = $this->productRepository->findAll();

        // On renvoie les produits à la vue
        return $this->twig->render($response, 'product/list.twig', [
            'products' => $products
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
        // Requête SQL
        $product = $this->productRepository->findBy([
            'id' => $args['id']
        ]);

        // On teste si un produit a été retourné
        if (empty($product)) {
            // Page d'erreur 404
            return $this->twig
                ->render($response, 'errors/error404.twig')
                ->withStatus(404)
            ;
        }

        return $this->twig->render($response, 'product/show.twig', [
            'product' => $product[0]
        ]);
    }
}
