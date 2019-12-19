<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Stage;

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
        return $this->render('pro_stage/entreprises.html.twig');

    }


    public function afficherFormations()
    {
        return $this->render('pro_stage/formations.html.twig');
    }


    public function afficherDescriptifStage($id)
    {
      return $this->render('pro_stage/stages.html.twig', [
          'idRessources' => $id
      ]);
    }


}
