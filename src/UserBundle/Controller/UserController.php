<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

class UserController extends Controller
{
    public function show_graphistesAction()
    {
        $graphistes =$this->getDoctrine()
            ->getRepository(User::class)
            ->findGraphistes();
        return $this->render('UserBundle:Graphistes:graphistes.html.twig', array('g' => $graphistes));
    }



    public function show_graphistes1Action()
    {
        $graphistes =$this->getDoctrine()
            ->getRepository(User::class)
            ->findGraphistesByNiveau1();
        return $this->render('UserBundle:Graphistes:graphistes.html.twig', array('g' => $graphistes));
    }

    public function show_graphistes2Action()
    {
        $graphistes =$this->getDoctrine()
            ->getRepository(User::class)
            ->findGraphistesByNiveau2();
        return $this->render('UserBundle:Graphistes:graphistes.html.twig', array('g' => $graphistes));
    }

    public function show_graphistes3Action()
    {
        $graphistes =$this->getDoctrine()
            ->getRepository(User::class)
            ->findGraphistesByNiveau3();
        return $this->render('UserBundle:Graphistes:graphistes.html.twig', array('g' => $graphistes));
    }
}
