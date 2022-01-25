<?php

namespace App\Controller;

use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController {

    #[Route('/', name: 'app')]
    public function index(Request $request, CustomerRepository $repo): Response {
        $customers = $repo->findAll();
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
            'name' => $request->query->get('name', 'inconnu'),
        ]);
    }
    #[Route('/base2', name: 'app_base2')]
    public function base2(Request $request): Response {
        return $this->render('app/base2.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}
