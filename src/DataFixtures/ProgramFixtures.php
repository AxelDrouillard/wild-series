<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $program1 = new Program();
        $program1->setTitle('Walking dead');
        $program1->setSynopsis('Des zombies envahissent la terre');
        $program1->setCategory($this->getReference('category_Action'));
        $manager->persist($program1);
        $manager->flush();
    
    }

    public function getDependencies()
    {
         // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          CategoryFixtures::class,
        ];
    }
}
