<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PubliciteController extends Controller
{
    public function publicitejobidAction ()
    {
        return $this->render('@User/Publicite/publicite.html.twig');
    }
}
