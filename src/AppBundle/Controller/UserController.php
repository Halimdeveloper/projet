<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

// Import des classes de GeoIp2
use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;



class UserController extends Controller
{

/**
 * @Route("/index", name="index")
 * 
 */
    public function addAction(Request $request)
    {
        //on crée un utilisateur
        $user = new User();

        //on récupère le formulaire
        $form = $this->createForm(UserType::class, $user);

        //on gère la soumission
        $form->handleRequest($request);

        //si le formulaire a été soumis
        if ($form->isSubmitted() && $form->isValid()) {

            //on enregistre l'utilisateur dans la BDD
            $em = $this->getDoctrine()->getManager();   
            $em->persist($user);
            $em->flush();

            //on envoie un email récapitulatif à l'utilisateur et à l'admin



            //on retourne une réponse
            return new Response("Utilisateur ajouté dans la base de données.
             Vous devriez recevoir un mail de confirmation d'ici quelques minutes.");
        }

        //on génère le html du formulaire créé
        $formView = $form->createView();

        //on rend la vue
        return $this->render('userAdd.html.twig', array('form'=>$formView));
    }

    public function geolocAction(Request $request) {
        // on déclare la route vers le fichier de base de données de géolocalisation MaxMind
        $GeoLiteDatabasePath = $this->get('kernel')->getRootDir() . '/../geodb/geolite2-city/GeoLite2-City.mmdb';
        
        // on crée une instance du reader de GeoIp2 et on utilise la route vers la db comme argument
        $reader = new Reader($GeoLiteDatabasePath);
        
        try{
            // possibilité de récupérer l'ip de l'utilisateur avec $request->getClientIp()
            // mais en local (127.0.0.1) on tombe sur une exception (AddressNotFoundException)
      

            // pour l'exemple on initialise la donnée de géolocalisation à une adresse ip fixe (Minnesota)
            $record = $reader->city('128.101.101.101');
            
        } catch (AddressNotFoundException $ex) {
            // si l'ip n'est pas fixe ou un autre problème empêche la géolocalisation
            return new Response("Il n'est pas possible de géolocaliser cet utilisateur.");
        }
        
        // on retourne une réponse dans le navigateur (test)
        return new JsonResponse($record);

        /*
        On peut récupérer ensuite les coordonnées de $record :
        Pays = $record->country->name
        Région = $record->mostSpecificSubdivision->name
        Ville = $record->city->name

        */

    }

}