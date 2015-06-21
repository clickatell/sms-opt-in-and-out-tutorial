<?php

namespace Clickatell\SMSOptInAndOutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $subscribers = $this->getDoctrine()
            ->getRepository('ClickatellSMSOptInAndOutBundle:Subscriber')
            ->findAll();

        print "<pre>";
        print_r($subscribers);
        print "</pre>";

        $log = $this->getDoctrine()
            ->getRepository('ClickatellSMSOptInAndOutBundle:Mo\Log')
            ->findAll();

        print "<pre>";
        print_r($log);
        print "</pre>";

        return $this->render('ClickatellSMSOptInAndOutBundle:Default:index.html.twig', array('name' => $name));
    }
}
