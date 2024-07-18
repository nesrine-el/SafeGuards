<?php

declare(strict_types=1);

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {}

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 15; $i++) {
            $user = new User();
            $user->setEmail($faker->unique()->email);
            $user->setRoles([$faker->randomElement(['ROLE_VISITOR', 'ROLE_AUTHOR'])]);
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setAddress1($faker->streetAddress);
            $user->setAddress2($faker->optional()->secondaryAddress);
            $user->setCity($faker->city);
            $user->setZipCode($faker->postcode);
            $user->setCountry($faker->country);
            $user->setProfession($faker->jobTitle);
            $user->setPhone($faker->phoneNumber);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
