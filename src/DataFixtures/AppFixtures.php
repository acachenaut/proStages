<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $formationDutInfo = new Formation();
        $formationDutInfo->setCode("DUT Info");
        $formationDutInfo->setNom("DUT Informatique");
        $manager->persist($formationDutInfo);

        $manager->flush();
    }
}
