<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Annonce;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');


        $users = [];
        for ($i = 0; $i < 20; $i++) {
            $user = new User;
            $user
                ->setUsername($faker->firstName() . '_' . $faker->lastName())
                ->setEmail($faker->safeEmail())
                ->setrôles(['ROLE_USER']);

            $users[] = $user;
            $manager->persist($user);
            $users[] = $user;
        }
        // on crée 10 annonces avec descriptif  "aléatoires" en français
        $annonces = [];
        for ($i = 0; $i < 20; $i++) {
            $annonce = new Annonce();
            $annonce
                ->setTitle($faker->sentence())
                ->setprix($faker->prix())
                ->setDescription($faker->text())
                ->setImg($faker->imageUrl(640, 480, 'food', true))
                ->setCreationDate($faker->dateTimeImmutable())
                ->setModificationDate($faker->dateTimeImmutable())
                ->setCategory($faker->category())
                ->setCity($faker->city())
                ->setDepartement($faker->departement(5,true))
                ->setZipCity($faker->number())
                ->setValidity($faker->validity())
                ->setEtat($faker->etat());
                
            $manager->persist($annonce);
            $annonces[] = $annonce;
        }

        $manager->flush();
    }
}
