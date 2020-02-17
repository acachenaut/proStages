<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        //Création d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');

        $formationDutInfo = new Formation();
        $formationDutInfo->setCode("DUT Info");
        $formationDutInfo->setNom("DUT Informatique");
        $manager->persist($formationDutInfo);

        $formationLPMultimedia = new Formation();
        $formationLPMultimedia->setCode("LP Multimédia");
        $formationLPMultimedia->setNom("Licence Professionnelle Multimédia");
        $manager->persist($formationLPMultimedia);

        $formationDuTic = new Formation();
        $formationDuTic->setCode("DU TIC");
        $formationDuTic->setNom("Diplôme universitaire en Technologies de l'Information et de la Communication");
        $manager->persist($formationDuTic);

        $nbEntreprises=10;
        for ($i=1; $i<=$nbEntreprises ; $i++) {
          $idEntreprise="entreprise".$i;
          $idEntreprise = new Entreprise();
          $idEntreprise->setNom($faker->company);
          $idEntreprise->setAdresse($faker->address);
          $idEntreprise->setAcitivite($faker->realText($maxNbChars=200,$indexSize=2));
          $idEntreprise->setSite($faker->url);

          $nbStages = $faker->numberBetween($min=1, $max=3);
          for ($y=0; $y<$nbStages; $y++) {
              //Création d'un stage
              $numEntreprise = $faker->numberBetween($min=1, $max=10);

              $stage = new Stage();
              $stage->setTitre($faker->realText($maxNbChars = $faker->numberBetween($min = 30, $max = 100), $indexSize = 1));
              $stage->setEmail($faker->email);
              $stage->setDescription($faker->realText($maxNbChars = $faker->numberBetween($min = 600, $max = 1200), $indexSize = 1));
              $stage->setEntreprise($idEntreprise);

              $idEntreprise->addStage($stage);


              $nbFormations = $faker->numberBetween($min=1,$max=3);
              switch ($nbFormations) {
                  case '1':
                      $stage->addFormation($formationDutInfo);
                      $formationDutInfo->addStage($stage);
                      $manager->persist($formationDutInfo);
                      break;

                  case '2':
                  $stage->addFormation($formationDutInfo);
                  $formationDutInfo->addStage($stage);
                  $manager->persist($formationDutInfo);

                  $stage->addFormation($formationLPMultimedia);
                  $formationLPMultimedia->addStage($stage);
                  $manager->persist($formationLPMultimedia);
                      break;
                  default:    // 3 formations
                  $stage->addFormation($formationDutInfo);
                  $formationDutInfo->addStage($stage);
                  $manager->persist($formationDutInfo);

                  $stage->addFormation($formationLPMultimedia);
                  $formationLPMultimedia->addStage($stage);
                  $manager->persist($formationLPMultimedia);

                  $stage->addFormation($formationDuTic);
                  $formationDuTic->addStage($stage);
                  $manager->persist($formationDuTic);
                      break;
              }
              $manager->persist($stage);
}

  $manager->persist($idEntreprise);
        }


            $manager->flush();
}

}
