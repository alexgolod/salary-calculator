<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use App\Entity\Test;
use App\Type\CountryEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $faker->seed(10);

        $countries = array_values(CountryEnum::toArray());
        for ($i = 0; $i < 30; $i++) {

            $entity = new Employee(
                $faker->unique()->name,
                rand(3, 15) * 1000,
                rand(0, 1) == 1 ? rand(0, 4) : 0,
                new CountryEnum($countries[rand(0, count($countries) - 1)]),
                rand(18, 70),
                rand(0, 1) == 1
            );

            $manager->persist($entity);
        }

        $manager->flush();
    }
}
