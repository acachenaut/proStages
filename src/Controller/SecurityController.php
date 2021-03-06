<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\UserType;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{

    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }


    public function logout()
    {
    }

    public function inscription(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {

        $utilisateur = new User();

        $formulaireUtilisateur = $this->createForm(UserType::class, $utilisateur);


        $formulaireUtilisateur->handleRequest($request);

         if ($formulaireUtilisateur->isSubmitted() && $formulaireUtilisateur->isValid())
         {
            $utilisateur->setRoles(['ROLE_USER']);

            $encodagePassword = $encoder->encodePassword($utilisateur, $utilisateur->getPassword());
            $utilisateur->setPassword($encodagePassword);

            $manager->persist($utilisateur);
            $manager->flush();

            return $this->redirectToRoute('app_login');
         }

        return $this->render('security/inscription.html.twig',['vueFormulaire' => $formulaireUtilisateur->createView()]);
    }
}
