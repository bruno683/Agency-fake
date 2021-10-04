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
                'label'=>'Pays :',
                'choices'=> [
                    '1'=>'Estonie',
                    '2'=>'Lettonie',
                    '3'=>'Lituanie',
                    '4'=>'Boznie-Herzégovine',
                    '5'=>'Bulgarie',
                    '6'=>'Croatie',
                ]
            ])
            ->add('skills', ChoiceType::class, [
                'label'=>'Competences',
                'choices'=> [
                    '1'=>'Explosifs',
                    '2'=>'Arts martiaux',
                    '3'=>'Armes Blanches',
                    '4'=>'Armes de poing',
                    '5'=>'Poison',
                    '6'=>'Sniper',
                    '7'=>'Infiltration'
                ]

            ])
            ->add('agents', EntityType::class,[
                'class'=> Agents::class,
                'choice_label'=> function(AgentsRepository $agents){
                    return $agents->createQueryBuilder('a')->orderBy('a.lastname', 'ASC');
                },
                'multiple'=>true
            ])
            ->add('targets', EntityType::class, [
                'label'=>'Cibles',
                'class'=> Targets::class,
                'choice_label'=> function(TargetsRepository $targetsRepo){
                    return $targetsRepo->createQueryBuilder('t')->orderBy('t.lastName', 'ASC');
                },
            ])
            ->add('contacts', EntityType::class, [
                'class'=>Contacts::class,
                'choice_label'=> function(ContactsRepository $contactsRepo){
                    return $contactsRepo->createQueryBuilder('c')->orderBy('c.LastName', 'ASC');
                },
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
