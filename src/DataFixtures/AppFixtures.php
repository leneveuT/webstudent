<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Home;
use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $home = new Home();
        $home->setCode('SPT');
        $home->setName('Serpentard');
        $manager->persist($home);

        $home = new Home();
        $home->setCode('GFD');
        $home->setName('Griffondor');
        $manager->persist($home);

        $home = new Home();
        $home->setCode('PFS');
        $home->setName('Poufsouffle');
        $manager->persist($home);

        $home = new Home();
        $home->setCode('SRG');
        $home->setName('Serdaigle');
        $manager->persist($home);


        $etudiant = new Etudiant();
        $etudiant->setNom('Potter');
        $etudiant->setPrenom('Harry');
        $etudiant->setDateNaiss(new \DateTime('1980-07-31'));
        $etudiant->setVille('Surrey');
        $etudiant->setNumRue('4');
        $etudiant->setRue('Privet Drive');
        $etudiant->setCoPos('50107');
        $etudiant->setSurnom('Le ballafré');
        $etudiant->setPhoto('harry');
        $manager->persist($etudiant);

        $etudiant = new Etudiant();
        $etudiant->setNom('Granger');
        $etudiant->setPrenom('Hermione');
        $etudiant->setDateNaiss(new \DateTime('1979-09-19'));
        $etudiant->setVille('Birmingham');
        $etudiant->setNumRue('7');
        $etudiant->setRue('Sleepy Hollow');
        $etudiant->setCoPos('69878');
        $etudiant->setSurnom('Sang-de-Bourbe');
        $etudiant->setPhoto('hermione');
        $manager->persist($etudiant);

        $etudiant = new Etudiant();
        $etudiant->setNom('Weasley');
        $etudiant->setPrenom('Ron');
        $etudiant->setDateNaiss(new \DateTime('1980-03-01'));
        $etudiant->setVille('Le Terrier');
        $etudiant->setRue('dans les champs');
        $etudiant->setSurnom('Ron-Ron');
        $etudiant->setPhoto('ron');
        $manager->persist($etudiant);

        $etudiant = new Etudiant();
        $etudiant->setNom('Malfoy');
        $etudiant->setPrenom('Drago');
        $etudiant->setDateNaiss(new \DateTime('1980-06-05'));
        $etudiant->setVille('Manoir Malfoy');
        $etudiant->setSurnom('malfoy');
        $etudiant->setPhoto('drago');
        $manager->persist($etudiant);


        $skill = new Skill();
        $skill->setCode('POT');
        $skill->setLibelle('Potions');
        $skill->setNbEtudiantsMax(12);
        $manager->persist($skill);

        $skill = new Skill();
        $skill->setCode('DFM');
        $skill->setLibelle('Défenses contre les forces du mal');
        $skill->setNbEtudiantsMax(40);
        $manager->persist($skill);

        $skill = new Skill();
        $skill->setCode('MET');
        $skill->setLibelle('Métamorphoses');
        $skill->setNbEtudiantsMax(20);
        $manager->persist($skill);

        $skill = new Skill();
        $skill->setCode('BOT');
        $skill->setLibelle('Botanique');
        $skill->setNbEtudiantsMax(40);
        $manager->persist($skill);

        $skill = new Skill();
        $skill->setCode('AST');
        $skill->setLibelle('Astronomie');
        $skill->setNbEtudiantsMax(40);
        $manager->persist($skill);

        $skill = new Skill();
        $skill->setCode('DIV');
        $skill->setLibelle('Divination');
        $skill->setNbEtudiantsMax(20);
        $manager->persist($skill);


        $manager->flush();
    }
}
