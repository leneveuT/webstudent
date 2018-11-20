<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Entity\Home;
use App\Form\EtudiantType;
use App\Form\EtudiantModifierType;
use Symfony\Component\HttpFoundation\Request;

class EtudiantController extends AbstractController
{
    public function index()
    {
      /* Cette simple instruction permet d'envoyer des informations au navigateur sans passer par une vue.
      return new Response('<html><body>Salut Les SIO</body></html>');
      */

      // initialise une variable qui sera exploitée dans la vue
      $annee = '2019';
      return $this->render('etudiant/accueil.html.twig', ['pAnnee' => $annee,
      ]);
    }

    public function ajouterEtudiant(Request $request)
    {
      $etudiant = new Etudiant();

      $form = $this->createForm(EtudiantType::class, $etudiant);

      $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
          $etudiant = $form->getData();

          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($etudiant);
          $entityManager->flush();

          return $this->redirectToRoute('etudiant_show', array('id' => $etudiant->getId()));
       };

       return $this->render('etudiant/ajouter.html.twig', array(
         'form' => $form->createView()
       ));
	}

  /**
   * @Route("/etudiant/consulter/{id}", name="etudiant_show")
   */
  public function consulterEtudiant($id){

		$etudiant = $this->getDoctrine()
        ->getRepository(Etudiant::class)
        ->find($id);

		if (!$etudiant) {
			throw $this->createNotFoundException(
            'Aucun etudiant trouvé avec le numéro '.$id
			);
		}

		//return new Response('Etudiant : '.$etudiant->getNom());
		return $this->render('etudiant/consulter.html.twig', [
            'etudiant' => $etudiant,]);
	}

  public function listerEtudiant(){
		$repository = $this->getDoctrine()->getRepository(Etudiant::class);
		$etudiants = $repository->findAll();
		return $this->render('etudiant/lister.html.twig', [
            'etudiants' => $etudiants,]);
  }

  /**
   * @Route("/etudiant/edit/{id}", name="etudiant_edit")
   */
   public function edit($id, Request $request)
   {
     //récupération de l'étudiant dont l'id est passé en paramètre
  		$etudiant = $this->getDoctrine()
          ->getRepository(Etudiant::class)
          ->find($id);

  		if (!$etudiant) {
  			throw $this->createNotFoundException(
              'Aucun etudiant trouvé avec le numéro '.$id
  			);
  		}
  		else
  		{
        $form = $this->createForm(EtudiantModifierType::class, $etudiant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

                 $etudiant = $form->getData();
                 $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($etudiant);
                 $entityManager->flush();

                 return $this->redirectToRoute('etudiant_show', array('id' => $etudiant->getId()));
        }

          return $this->render('etudiant/ajouter.html.twig', array('form' => $form->createView(),));

      }
   }
}
