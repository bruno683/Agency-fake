<?php

namespace App\Form;

use App\Entity\Agents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class, [
                'label'=> 'Nom :'
            ])
            ->add('firstName', TextType::class, [
                'label'=> 'Prénom :'
            ])
            ->add('codeName', TextType::class, [
                'label'=> 'Nom de code :'
            ])
            ->add('skills', ChoiceType::class, [
                'label'=>'Competences',
                'choices'=> [
                    'Explosifs'=>'Explosifs',
                    'Arts martiaux'=>'Arts martiaux',
                    'Armes Blanches'=>'Armes Blanches',
                    'Armes de poing'=>'Armes de poing',
                    'Poison'=>'Poison',
                    'Sniper'=>'Sniper',
                    'Infiltration'=>'Infiltration'
                ]
                
            ])
            ->add('dateOfBirth', DateType::class, [
                'label'=>'Date de naissance',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ])
            ->add('nationality', ChoiceType::class, [
                'choices' => [
                    'Belgium' => 'Belgique',
                    'Brazil' => 'Brésil',
                    'China' => 'Chine',
                    'Congo' => 'Congo',
                    'France' => 'France',
                    'Japon' => 'Japon',
                    'UK' => 'Royaume-Unis',
                    'Suede'=>'Suéde',
                    'USA' => 'USA',
                    'Russia' => 'Russie',
                    'Swiss' => 'Suisse',
                    'Espana'=>'Espagne'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agents::class,
        ]);
    }
}
