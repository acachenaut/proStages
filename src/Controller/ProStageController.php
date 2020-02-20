<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\StageRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;
use App\Entity\Entreprise;

class ProStageController extends AbstractController
{


    public function afficherAccueil(StageRepository $repoStage)
    {
      $stages=$repoStage->findTousLesStages();
      return $this->render('pro_stage/accueil.html.twig',['stages'=>$stages]);
    }


    public function afficherEntreprises(EntrepriseRepository $repoEntreprise)
    {
      $entreprises=$repoEntreprise->findall();
      return $this->render('pro_stage/entreprises.html.twig',['entreprises'=>$entreprises]);

    }

    public function entreprise($nomEntreprise, StageRepository $repoStage)
    {
        $stages = $repoStage->findByEntreprise($nomEntreprise);
        return $this->render('pro_stage/entreprise.html.twig',
        ['stages'=>$stages, 'nomEntreprise'=>$nomEntreprise]);
    }

    public function afficherFormations(FormationRepository $repoFormation)
    {
      $formations=$repoFormation->findall();
      return $this->render('pro_stage/formations.html.twig',['formations'=>$formations]);
    }

    public function formation($nomFormation, StageRepository $repoStage)
   {
       $stages = $repoStage->findByFormation($nomFormation);
       return $this->render('pro_stage/formation.html.twig',
       ['stages'=>$stages, 'nomFormation'=>$nomFormation]);
   }


    public function afficherDescriptifStage($id,StageRepository $repoStage)
    {
      $stage = $repoStage->find($id);
      return $this->render('pro_stage/stage.html.twig',
      ['stage'=>$stage]);
    }

    public function ajouterEntreprise()
    {
      $entreprise = new Entreprise();

      $formulaireEntreprise = $this->createFormBuilder($entreprise)
      ->add('nom')
      ->add('adresse')
      ->add('acitivite')
      ->add('site')
      ->getForm();
      return $this->render('pro_stage/ajouterEntreprise.html.twig',['vueFormulaire'=>$formulaireEntreprise->createView()]);
    }


}
