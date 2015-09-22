<?php

namespace UIR\CasanetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CasanetBundle:Default:index.html.twig');
    }
}
