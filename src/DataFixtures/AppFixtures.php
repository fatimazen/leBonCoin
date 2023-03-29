<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Annonce;
use App\Entity\Reponse;
use DateTimeImmutable;
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
        // on crée 20 annonces avec descriptif  "aléatoires" en français

        $annonces = [];
        for ($i = 0; $i < 20; $i++) {
            //je creer une variable date pour le datetime immutabla

            $annonce = new Annonce();
            $annonce
                ->setTitle($faker->sentence(6))
                ->setPrix($faker->randomFloat(3))
                ->setDescription($faker->text())
                ->setImg($faker->imageUrl(640, 480, 'food', true))
                ->setCreationDate(DateTimeImmutable::createFromMutable($faker->dateTime("2014-06-20 11:45 Europe/London")))
                ->setModificationDate(DateTimeImmutable::createFromMutable($faker->dateTime(("2014-06-20 11:45 Europe/London"))))
                ->setCategory($faker->randomElement(['Informatique', 'Maison', 'Jardin', 'Véhicules', 'Loisirs', 'Immobilier']))
                ->setCity($faker->city())
                ->setDepartement($faker->departmentNumber(['30' => 'Gard']))
                ->setZipCity($faker->postcode)
                ->setValidity(DateTimeImmutable::createFromMutable($faker->dateTime("2014-06-20 11:45 Europe/London")))
                ->setEtat($faker->randomElement(['neuf', 'occasion', 'reconditionné']));


            $manager->persist($annonce);
            $annonces[] = $annonce;
        }
        $reponses=[];
        for ($i = 0; $i < 20; $i++) {
            $reponse = new Reponse();
            $reponse

                ->setReponse($faker->text('200'))
                ->addUser($faker->randomElement($users))
                ->addAnnonce($faker->randomElement($annonces));

            $manager->persist($reponse);
            $reponses[]= $reponse ;
        }




        $manager->flush();
    }
}
