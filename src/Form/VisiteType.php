<?php

namespace App\Form;

use App\Entity\Visites;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('ville')
        ->add('pays')
        ->add('datecreation',null, [
            'widget' => 'single_text',
            'label' => 'Date'
        ])
        ->add('note')
        ->add('avis')
        ->add('tempmin', null, [
            'label' => 't° min'
        ])
        ->add('tempmax', null, [
            'label' => 't° max'])
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


