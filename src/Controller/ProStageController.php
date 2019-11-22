<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProStageController extends AbstractController
{

    public function index()
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }

    public function afficherAccueil()
    {
      return $this->render('pro_stage/accueil.html.twig');
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
