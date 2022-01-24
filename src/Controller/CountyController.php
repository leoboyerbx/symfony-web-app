<?php

namespace App\Controller;

use App\Entity\County;
use App\Form\CountyType;
use App\Repository\CountyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/county')]
class CountyController extends AbstractController
{
    #[Route('/', name: 'county_index', methods: ['GET'])]
    public function index(CountyRepository $countyRepository): Response
    {
        return $this->render('county/index.html.twig', [
            'counties' => $countyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'county_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $county = new County();
        $form = $this->createForm(CountyType::class, $county);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($county);
            $entityManager->flush();

            return $this->redirectToRoute('county_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('county/new.html.twig', [
            'county' => $county,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'county_show', methods: ['GET'])]
    public function show(County $county): Response
    {
        return $this->render('county/show.html.twig', [
            'county' => $county,
        ]);
    }

    #[Route('/{id}/edit', name: 'county_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, County $county, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CountyType::class, $county);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('county_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('county/edit.html.twig', [
            'county' => $county,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'county_delete', methods: ['POST'])]
    public function delete(Request $request, County $county, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$county->getId(), $request->request->get('_token'))) {
            $entityManager->remove($county);
            $entityManager->flush();
        }

        return $this->redirectToRoute('county_index', [], Response::HTTP_SEE_OTHER);
    }
}
