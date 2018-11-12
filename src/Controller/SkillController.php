<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Skill;

class SkillController extends AbstractController
{
    /**
     * @Route("/skills", name="skill")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Skill::class);
        $skills = $repository->findAll();
        return $this->render('skill/index.html.twig', [
            'skills' => $skills
        ]);
    }

    /**
     * @Route("/skills/{id}", name="skill_show")
     */
    public function show($id)
    {
        $skill = $this->getDoctrine()
            ->getRepository(Skill::class)
            ->find($id);

        return $this->render('skill/show.html.twig', [
            'skill' => $skill
        ]);
    }
}
