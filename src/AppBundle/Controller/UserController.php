<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;



class UserController extends Controller
{

/**
 * @Route("/index", name="index")
 * 
 */
    public function addAction()
    {
        //on crée un utilisateur
        $user = new User();

        //on récupère le formulaire
        $form = $this->createForm(UserType::class, $user);

        //on génère le html du formulaire créé
        $formView = $form->createView();

        //on rend la vue
        return $this->render('userAdd.html.twig', array('form'=>$formView));
    }

}