<?php


namespace App\Controller;


use App\Entity\User;
use App\Traits\ApiTraits;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Helpers\ApiCodes;

/**
 * Class UserController
 * @package App\Controller
 * @Route("/users")
 */

class UserController extends AbstractController
{
    use ApiTraits;

    /**
     * @Route("/", name="getUsers", methods={"GET"})
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->responseToJson(ApiCodes::getSuccessMessage(), ApiCodes::SUCCESS, $users);
    }
}