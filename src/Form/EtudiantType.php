<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
          ->add('nom', TextType::class)
          ->add('prenom', TextType::class)
          ->add('dateNaiss', DateTimeType::class, array('input' => 'datetime',
                                                        'widget' => 'single_text',
                                                        'format' => 'dd/MM/yyyy',
                                                        'required' => true,
                                                        'label' =>'date de naissance',
                                                        'placeholder' => 'jj/mm/aaaa'))
          ->add('ville', TextType::class)
          ->add('numRue', TextType::class)
          ->add('rue', TextType::class)
          ->add('copos', TextType::class)
          ->add('surnom', TextType::class)
          ->add('photo', TextType::class)
          ->add('home', EntityType::class, array('class' => 'App\Entity\Home','choice_label' => 'name' ))
          //->add('promotion')
     ->add('enregistrer', SubmitType::class, array('label' => 'Nouvel étudiant'))
      ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
