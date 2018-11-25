<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Professeur;

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
}
