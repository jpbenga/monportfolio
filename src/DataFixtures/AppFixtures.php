<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $project = new Project();
            $project->setName($faker->sentence(). $i);
            $project->setDescription($faker->paragraph(2));
            $project->setDatecrea($faker->dateTimeThisMonth('+10 days'));
            $project->setLink($faker->url());
            $project->setImage($faker->url());

            $manager->persist($project);
        }

        $manager->flush();
    }
}
