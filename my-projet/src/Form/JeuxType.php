<?php

namespace App\Form;

use App\Entity\Jeux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class JeuxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('genre', ChoiceType::class, array(
                'choices' => array(
                    'Aventure' => 'Aventure',
                    'Course' => 'Course',
                    'Combat'   => 'Combat',
                    'Guerre' => 'Guerre',
                    'Sport' => 'Sport',
                ),
            ))
            ->add('console')
            ->add('image')
            ->add('dateDeSortie', DateType::class)
            ->add('commentaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jeux::class,
        ]);
    }
}
