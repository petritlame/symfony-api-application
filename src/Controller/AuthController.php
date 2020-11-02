<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use App\Helpers\AbstractApiController;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/**
 * Class AuthController
 * @package App\Controller
 */

class AuthController extends AbstractApiController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/auth", name="auth")
     */
    public function index(): Response
    {

    }


    /**
     * @param Request $request
     * @Route("/register", name="register", methods={"POST"})
     * @return Response
     */
    public function register(Request $request): Response
    {

        $user = new User();

        $form = $this->buildForm(UserType::class, $user, ['method' => 'POST']);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()){
            $errors = $this->getErrorsFromForm($form);
            return new JsonResponse($errors);
            die();
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }

        $user->setPassword($form->get('password')->getData());

        $user = $this->userRepository->createUser($user);

        return $this->respond($user, Response::HTTP_OK);

    }


}
