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

    public function entreprise($id)
    {
        $repoEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repoEntreprise->find($id);
        return $this->render('pro_stage/entreprise.html.twig',
        ['entreprise'=>$entreprise]);
    }

    public function afficherFormations()
    {
      $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
      $formations=$repositoryFormation->findall();
      return $this->render('pro_stage/formations.html.twig',['formations'=>$formations]);
    }

    public function formation($id)
   {
       $repoFormation = $this->getDoctrine()->getRepository(Formation::class);
       $formation = $repoFormation->find($id);
       return $this->render('pro_stage/formation.html.twig',
       ['formation'=>$formation]);
   }


    public function afficherDescriptifStage($id)
    {
      $repoStage = $this->getDoctrine()->getRepository(Stage::class);
      $stage = $repoStage->find($id);
      return $this->render('pro_stage/stages.html.twig',
      ['stage'=>$stage]);
    }


}
