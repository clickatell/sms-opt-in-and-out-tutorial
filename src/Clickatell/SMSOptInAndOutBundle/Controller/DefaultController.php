<?php

namespace Clickatell\SMSOptInAndOutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $subscribers = $this->getDoctrine()
            ->getRepository('ClickatellSMSOptInAndOutBundle:Subscriber')
            ->findAll();

        print "<h1>Subscribers</h1>";
        print "<pre>";
        /** @type \Clickatell\SMSOptInAndOutBundle\Entity\Subscriber $subscriber */
        foreach ($subscribers as $subscriber)
        {
            print "$subscriber\n";
        }
        print "</pre>";

        $log = $this->getDoctrine()
            ->getRepository('ClickatellSMSOptInAndOutBundle:Mo\Log')
            ->findAll();

        print "<h1>Mo Log</h1>";
        print "<pre>";
        foreach ($log as $entry)
        {
            print "$entry\n";
        }
        print "</pre>";

        return $this->render('ClickatellSMSOptInAndOutBundle:Default:index.html.twig');
    }
}
