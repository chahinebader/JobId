<?php

namespace DescriptionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DescriptionBundle:Default:index.html.twig');
    }
}
