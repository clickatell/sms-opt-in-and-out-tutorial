<?php

namespace Clickatell\SMSOptInAndOutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClickatellSMSOptInAndOutBundle:Default:index.html.twig', array('name' => $name));
    }
}
