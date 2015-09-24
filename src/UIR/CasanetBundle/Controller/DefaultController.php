<?php

namespace UIR\CasanetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository("CasanetBundle:Event")->findAll();
        return $this->render('CasanetBundle:Default:index.html.twig', [
            "entities" => $entities,
        ]);
    }

    public function descAction()
    {
        return $this->render('CasanetBundle:Default:description.html.twig');
    }

    public function strategyAction()
    {
        return $this->render('CasanetBundle:Default:strategy.html.twig');
    }

    public function partnersAction()
    {
        return $this->render('CasanetBundle:Default:partners.html.twig');
    }

    public function contactAction()
    {
        return $this->render('CasanetBundle:Default:contact.html.twig');
    }
}
