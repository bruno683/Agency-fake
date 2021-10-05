<?php

namespace App\Form;

use App\Entity\Agents;
use App\Entity\Contacts;
use App\Entity\Missions;
use App\Entity\Targets;
use App\Repository\AgentsRepository;
use App\Repository\ContactsRepository;
use App\Repository\TargetsRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label'=>'Titre :'
            ])
            ->add('description', TextareaType::class)
            ->add('codeName', TextType::class, [
                'label'=>'Nom de code :'
            ])
            ->add('type', TextType::class)
            ->add('startDate', DateType::class, [
                'label'=>'Date de début',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ])
            ->add('endDate', DateType::class, [
                'label'=>'Date de début',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ])
            ->add('status', TextType::class)
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'Belgium' => 'Belgium',
                    'Brazil' => 'Brazil',
                    'China' => 'China',
                    'Congo' => 'Congo',
                    'France' => 'France',
                    'Japan' => 'Japan',
                    'UK' => 'UK',
                    'USA' => 'USA',
                    'Russia' => 'Russia',
                    'Swiss' => 'Swiss',
                ]
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
            ->add('agents', EntityType::class,[
                'class'=> Agents::class,
                'choice_label'=>'lastName',
                /*'choice_label'=> function($agents){
                    return $agents->getLastName() .' ('. $agents->getNationality().')';
                },*/
                'multiple'=> true,
                'expanded'=>true
              
            ])
            ->add('targets', EntityType::class, [
                'choice_label' => function ($targets) {
                    return $targets->getLastName() . " (" . $targets->getNationality() . ")";
                },
                'class' => Targets::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('contacts', EntityType::class, [
                'class'=>Contacts::class,
                'choice_label'=> function(Contacts $contacts){
                    return $contacts->getLastName().' '. $contacts->getFirstName();
                },
                'multiple'=>true,
                'expanded'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Missions::class,
        ]);
    }
}
