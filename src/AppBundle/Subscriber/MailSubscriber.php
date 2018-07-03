<?php

namespace AppBundle\Subscriber;

use AppBundle\Entity\User;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class MailSubscriber implements EventSubscriber
{
    private $mailer;
    private $from = 'send@example.com';

    function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function getSubscribedEvents()
    {
        return [
            'postPersist'
        ];
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $user = $args->getObject();

        // si le postpersist n'est pas pour un user, on quitte
        if (!$user instanceof User) {
            return;
        }

        // envoi du message à l'utilisateur
        $this->sendMail(
          $user->getEmail(),
          'Vous êtes enregistré',
          'Et ça c\'est cool'
        );

        // envoi du message à l'administrateur
        $prenom = $user->getFirstname();
        $nom = $user->getLastname();

        $this->sendMail(
          'h.izzouzi@live.fr',
          'Un nouvel enregistrement sur le site',
          'L\'utilisateur' . $prenom . $nom . 'vient de s\'enregistrer'
        );
    }

    private function sendMail($to, $subject, $message)
    {
        $message = (new \Swift_Message($subject))
          ->setFrom($this->from)
          ->setTo($to)
          ->setBody(sprintf('<html>%s</html>', $message))
        ;

        $mailer->send($message);
    }
}
