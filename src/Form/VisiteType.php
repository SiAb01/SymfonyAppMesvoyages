<?php

namespace App\Form;

use App\Entity\Visites;
use App\Entity\Environnement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use DateTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('ville')
        ->add('pays')
        ->add('datecreation',  DateType::class ,[
            'widget' => 'single_text',
            'data' => isset($options['data']) &&
                    $options['data']->getDateCreation() != null ? $options['data']->getDateCreation() : new DateTime('now'),
            'label' => 'Date'
        ])
        //Imposer des notes min et max à l'user dans le champs note
        ->add('note',  IntegerType::class, [
            'attr' => [
                'min' => 0,
                'max' => 20
            ]
        ])

        ->add('avis')
        ->add('tempmin', null, [
            'label' => 't° min'
        ])
        ->add('tempmax', null, [
            'label' => 't° max'])
        // Crée un champ de formulaire permettant de sélectionner plusieurs environnements.
        ->add('environnements', EntityType::class, [
            'class' => Environnement::class,
            'choice_label' => 'nom',
            'multiple' => true,
            'required' => false
        ])
        // champ pour l'image 
        ->add('imageFile', FileType::class, [
            'required' => false,
            'label' => 'sélection image'
        ])

            // ajout du bouton pour pour soumettre le formulaire
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Visites::class,
        ]);
    }
}


