<?php

namespace App\Form;

use App\Entity\HideOuts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HideOutsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class, [
                'label'=> 'Code :'
            ] )
            ->add('type', TextType::class, [
                'label'=>'Type de planque :'
            ])
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'Belgium' => 'Belgium',
                    'Brazil' => 'Brazil',
                    'China' => 'China',
                    'Congo' => 'Congo',
                    'France' => 'France',
                    'Japan' => 'Japan',
                    'Suede'=> 'Suéde',
                    'UK' => 'UK',
                    'USA' => 'USA',
                    'Russia' => 'Russia',
                    'Swiss' => 'Swiss',
                ]
            ] )
            ->add('city', ChoiceType::class, [
                'choices' => [
                    'Bruxelles' => 'Bruxelles',
                    'Rio'=>'Rio',
                    'Bei-Jing'=> 'Pékin',
                    'Kinshasa'=> 'Kinshasa',
                    'Paris'=>'Paris',
                    'Tokyo'=> 'Tokyo',
                    'Stockholm'=>'Stockholm',
                    'London'=>'Londres',
                    'Washington'=> 'Washington',
                    'Moscow'=> 'Moscou',
                    'Geneva'=> 'Genève'

                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HideOuts::class,
        ]);
    }
}
