<?php

namespace NiveauBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NiveauBundle:Default:index.html.twig');
    }
}
