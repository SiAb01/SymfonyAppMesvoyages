<?php

namespace App\DataFixtures;

use App\Entity\Visites;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Provider\fr_FR\Address ;

class VisiteFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {






        ///fzaninotto/faker est abandonne est n'est pas supporté par Php 8.1 utilisation alternative FakerPhp
        // création du faker pour la génération des valeurs aléatoires
        
        $faker = Factory::create('fr_FR');
        // génération des enregistrements
        for($k=0 ; $k<100 ; $k++){
            $visite = new Visites();
            $visite->setVille($faker->city)
                    ->setPays($faker->country)
                    ->setDatecreation(($faker->dateTimeBetween('-10 years', 'now')))
                    ->setTempmin($faker->numberBetween(-20, 10))
                    ->setTempmax($faker->numberBetween(10, 40))
                    ->setNote($faker->numberBetween(0, 20))
                    ->setAvis($faker->sentences(4, true));
        
            // enregisrement de l'objet
            $manager->persist($visite);
        }
        $manager->flush();
    }
}





