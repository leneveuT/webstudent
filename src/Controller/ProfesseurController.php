<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Professeur;
use App\Form\ProfesseurType;

class ProfesseurController extends AbstractController
{
    /**
     * @Route("/professeurs", name="professeur_index")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Professeur::class);
        $professeurs = $repository->findAll();

        return $this->render('professeur/index.html.twig', [
            'professeurs' => $professeurs
        ]);
    }

    /**
     * @Route("/professeur/new", name="professeur_new")
     */
    public function new(Request $request)
    {
      $professeur = new Professeur();

      $form = $this->createForm(ProfesseurType::class, $professeur);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
         $professeur = $form->getData();

         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($professeur);
         $entityManager->flush();

         return $this->redirectToRoute('professeur_show', array('id' => $professeur->getId()));
      };

      return $this->render('professeur/new.html.twig', [
          'form' => $form->createView()
      ]);
    }

    /**
     * @Route("/professeur/{id}", name="professeur_show")
     */
    public function show($id)
    {
        $professeur = $this->getDoctrine()
            ->getRepository(Professeur::class)
            ->find($id);

        return $this->render('professeur/show.html.twig', [
            'professeur' => $professeur
        ]);
    }
}
