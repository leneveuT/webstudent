<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Skill;
use App\Form\SkillType;

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
    public function new(Request $request)
    {
      $skill = new Skill();

      $form = $this->createForm(SkillType::class, $skill);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
         $skill = $form->getData();

         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($skill);
         $entityManager->flush();

         return $this->redirectToRoute('skill_show', array('id' => $skill->getId()));
      };

      return $this->render('skill/new.html.twig', [
          'form' => $form->createView()
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
