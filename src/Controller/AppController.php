<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController {

    #[Route('/home', name: 'app_home')]
    public function home(Request $request) {
        return $this->render('home.twig', [
            'name' => $request->query->get('name') ?? 'inconnu'
        ]);
    }
}
