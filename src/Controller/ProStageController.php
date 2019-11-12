<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/pro/stage", name="pro_stage")
     */
    public function index()
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }
    /**
     * @Route("/", name="accueil")
     */
    public function afficherMessageAccueil()
    {
        return new Reponse('<html><body><h1>Bienvenu sur la page d\'accueil de Prostages</h1></body></html>');
    }
    /**
     * @Route("/entreprises", name="entreprises")
     */

    public function afficherMessageEntreprises()
    {
        return new Reponse('<html><body><h1>Cette page affichera la liste des entreprises proposant un stage</h1></body></html>');
    }
    /**
     * @Route("/formations", name="formations")
     */

    public function afficherMessageFormations()
    {
        return new Reponse('<html><body><h1>Cette page affichera la liste des formations de l\'IUT</h1></body></html>');
    }
    /**
     * @Route("/stages{id}", name="descriptifStage")
     */
     
    public function afficherDescriptifStage()
    {
        return new Reponse('<html><body><h1>Cette page affichera le descriptif du stage ayant pour identifiant id</h1></body></html>');
    }


}
