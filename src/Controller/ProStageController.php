<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

class ProStageController extends AbstractController
{


    public function afficherAccueil()
    {
      $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
      $stages=$repositoryStage->findAll();
      return $this->render('pro_stage/accueil.html.twig',['stages'=>$stages]);
    }


    public function afficherEntreprises()
    {
      $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
      $entreprises=$repositoryEntreprise->findall();
      return $this->render('pro_stage/entreprises.html.twig',['entreprises'=>$entreprises]);

    }


    public function afficherFormations()
    {
      $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
      $formations=$repositoryFormation->findall();
      return $this->render('pro_stage/formations.html.twig',['formations'=>$formations]);
    }


    public function afficherDescriptifStage($id)
    {
      return $this->render('pro_stage/stages.html.twig', [
          'idRessources' => $id
      ]);
    }


}
