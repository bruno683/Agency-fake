<?php

namespace App\DataFixtures;

use App\Entity\Agents;
use App\Entity\Contacts;
use App\Entity\Targets;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for( $i = 1; $i <= 25 ; $i++){
            $agents = new Agents();
            $agents->setLastName($faker->lastName())
                ->setFirstName($faker->firstName())
                ->setCodeName($faker->colorName())
                ->setDateOfBirth($faker->dateTimeBetween($startDate = '- 50 years', $endDate = '- 25 years', null ))
                ->setNationality($faker->country());
                
            $manager->persist($agents);
        }

        for( $i = 1; $i <= 25 ; $i++){
            $contacts = new Contacts();
            $contacts->setLastName($faker->lastName())
                ->setFirstName($faker->firstName())
                ->setCodeName($faker->colorName())
                ->setDateOfBirth($faker->dateTimeBetween($startDate = '- 50 years', $endDate = '- 25 years', null ))
                ->setNationality($faker->country());
            $manager->persist($contacts);
        }

        for( $i = 1; $i <= 25 ; $i++){
            $targets = new Targets();
            $targets->setLastName($faker->lastName())
                ->setFirstName($faker->firstName())
                ->setCodeName($faker->colorName())
                ->setDateOfBirth($faker->dateTimeBetween($startDate = '- 50 years', $endDate = '- 25 years', null ))
                ->setNationality($faker->country());
            $manager->persist($targets);
        }
      
        $manager->flush();
    }
}
