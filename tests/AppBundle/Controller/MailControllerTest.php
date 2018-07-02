<? namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MailControllerTest extends WebTestCase
{

    public function sendEmailAction($name, \Swift_Mailer $mailer)
{
    $message = (new \Swift_Message("Mail de confirmation d'inscription"))
        ->setFrom('h.izzouzi@gmail.com')
        ->setTo('h.izzouzi@live.fr')
        ->setBody('Ça devrait marcher')
    ;

    $mailer->send($message);

    return $this->render('userAdd.html.twig');

}

    public function testMailIsSentAndContentIsOk()
    {
        $client = static::createClient();

        // enables the profiler for the next request (it does nothing if the profiler is not available)
        $client->enableProfiler();

        $crawler = $client->request('POST', '/path/to/above/action');

        $mailCollector = $client->getProfile()->getCollector('swiftmailer');

        // checks that an email was sent
        $this->assertSame(1, $mailCollector->getMessageCount());

        $collectedMessages = $mailCollector->getMessages();
        $message = $collectedMessages[0];

        // Asserting email data
        $this->assertInstanceOf('Swift_Message', $message);
        $this->assertSame("Mail de confirmation d'inscription", $message->getSubject());
        $this->assertSame('h.izzouzi@gmail.com', key($message->getFrom()));
        $this->assertSame('h.izzouzi@live.fr', key($message->getTo()));
        $this->assertSame(
            'Ça devrait marcher',
            $message->getBody()
        );
    }
}