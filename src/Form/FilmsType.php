<?php

namespace App\Form;

use App\Entity\Acteurs;
use App\Entity\Films;
use App\Entity\Genres;
use App\Entity\Pays;
use App\Entity\Prix;
use App\Entity\Realisateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('annee')
            ->add('classementIMDB')
            ->add('duree')
            ->add('oscarGagne')
            ->add('boxOffice')
            ->add('IdIMDB')
            ->add('affiche')
            ->add('synopsis')
            ->add('bande_annonce')

            ->add('prix', EntityType::class, [
                'class' => Prix::class,
                'choice_label' => 'prix',
            ])

            ->add('pays', EntityType::class, [
                'class' => Pays::class,
                'choice_label' => 'nom_pays',
            ])

            ->add('realisateur', EntityType::class, [
                'class' => Realisateurs::class,
                'choice_label' => 'nom_realisateur',
            ])

            ->add('acteurs', EntityType::class, [
                'class' => Acteurs::class,
                'choice_label' => 'nom_Acteur',
                'multiple' => true,
                'expanded' => true,
            ])

            ->add('genres', EntityType::class, [
                'class' => Genres::class,
                'choice_label' => 'nom_Genre',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Films::class,
        ]);
    }
}
