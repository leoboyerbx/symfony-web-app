<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function index(AuthenticationUtils $authUtils): Response
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUserName = $authUtils->getLastUsername();

        return $this->render('login/login.html.twig', [
            'last_username' => $lastUserName,
            'error' => $error,
        ]);
    }
    #[Route('/logout', name: 'logout')]
    public function logout(AuthenticationUtils $authUtils): Response
    {
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
