<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Utilities\AbstractController;
use App\Utilities\FormValidator;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Views\Twig;

class AuthController extends AbstractController
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

    public function register(Request $request, ResponseInterface $response)
    {
        $formValidator = new FormValidator();

        if ($request->isMethod('POST')) {
            // Validation des champs
            $formValidator->validate([
                ['username', 'text', 128],
                ['email', 'text', 255],
                ['password', 'text', 128],
                ['password-confirm', 'text', 128],
            ]);
            // Vérification des mots de passe
            $formValidator->checkEquals('password', 'password-confirm');

            // On vérifie s'il n'y a pas d'erreur
            if (!$formValidator->isError()) {
                $user = new User(
                    $_POST['username'],
                    $_POST['email'],
                    $_POST['password'],
                    isset($_POST['role']) ? 'admin' : 'user'
                );

                $success = $this->userRepository->insert($user);

                if ($success) {
                    $_SESSION['flashes'] = [
                        [
                            'type' => 'success',
                            'message' => 'Vous êtes bien inscrit'
                        ]
                    ];

                    return $response->withStatus(301)
                        ->withHeader('Location', '/');
                }
            }
        }

        return $this->twig->render($response, 'auth/register.twig', [
            'formValidator' => $formValidator
        ]);
    }

    public function connect(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'auth/connect.twig');
    }
}
