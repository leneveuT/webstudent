<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Home;
use App\Form\HomeType;

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
     * @Route("/home/new", name="home_new")
     */
    public function new(Request $request)
    {
      $home = new Home();

      $form = $this->createForm(HomeType::class, $home);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
         $home = $form->getData();

         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($home);
         $entityManager->flush();

         return $this->redirectToRoute('home_show', array('id' => $home->getId()));
      };

      return $this->render('home/new.html.twig', [
          'form' => $form->createView()
      ]);
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
