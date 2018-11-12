<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Skill;

class SkillController extends AbstractController
{
    /**
     * @Route("/skills", name="skills")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Skill::class);
        $skills = $repository->findAll();
        return $this->render('skill/index.html.twig', [
            'skills' => $skills
        ]);
    }
}
