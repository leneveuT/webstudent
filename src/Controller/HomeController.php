<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Home;

class HomeController extends AbstractController
{
    /**
     * @Route("/homes", name="home")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Home::class);
        $homes = $repository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'homes' => $homes
        ]);
    }

    /**
     * @Route("/homes/new", name="home_new")
     */
    public function new()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $home = new Home();
        $home->setCode('SPT');
        $home->setName("Serpentard");

        $entityManager->persist($home);

        $entityManager->flush();

        return $this->redirectToRoute('home_show', array('id' => $home->getId()));
    }

    /**
     * @Route("/homes/{id}", name="home_show")
     */
    public function show($id)
    {
        $home = $this->getDoctrine()
            ->getRepository(Home::class)
            ->find($id);

        return $this->render('home/show.html.twig', [
            'home' => $home
        ]);
    }
}
