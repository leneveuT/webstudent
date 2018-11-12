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
}
