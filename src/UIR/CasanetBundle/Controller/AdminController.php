<?php

namespace UIR\CasanetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository("CasanetBundle:Event")->findAll();
        $articles = $em->getRepository("CasanetBundle:Article")->findAll();
        $projconfs = $em->getRepository("CasanetBundle:Projconf")->findAll();
        return $this->render('CasanetBundle:Admin:index.html.twig', [
            "events" => $events,
            "articles" => $articles,
            "projconfs" => $projconfs,
        ]);
    }
}
