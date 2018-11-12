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
     * @Route("/skills/new", name="skill_new")
     */
    public function new()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $skill = new Skill();
        $skill->setCode('POT');
        $skill->setLibelle('Potions');
        $skill->setNbEtudiantsMax(12);

        $entityManager->persist($skill);

        $entityManager->flush();

        return $this->redirectToRoute('skill_show', array('id' => $skill->getId()));
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
