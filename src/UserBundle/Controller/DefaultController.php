<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use UserBundle\Entity\User;

class DefaultController extends Controller {


    public function indexAction()
    {
        $authChecker = $this->container->get('security.authorization_checker');
        $router = $this->container->get('router');



        if ($authChecker->isGranted('ROLE_SUPER_ADMIN')) {
            return new RedirectResponse($router->generate('admin_mainpage'), 307);
        }
        else
        return $this->render('UserBundle:Default:index.html.twig');

    }

    public function inscriptionAction(Request $request){
        $user = new User ();

        $form_typeuser = $this->createFormBuilder($user)
            ->add('freelancer',RadioType::class,array('label'=> 'Freelancer','required' =>false) )
            ->add('client',RadioType::class,array('label'=> 'Client','required' =>false))
            ->add('save', SubmitType::class, array('label' => 'Suivant'))
            ->getForm();
        $form_typeuser->handleRequest($request);

        if ($form_typeuser->isSubmitted() && $form_typeuser->isValid()) {
            $user = $form_typeuser->getData();
            $session = new Session();
          //  $session->start();




            if ($user->getFreelancer() ) {
                $session->set('freelancer', true);
                $session->set('client', false);
            }
            else {
                $session->set('client',true);
                $session->set('freelancer', false);
                $session->set('individuelle',true);
            }

            return $this->redirectToRoute('fos_user_registration_register',array('session'=>$session));
        }




        return $this->render('UserBundle::inscription_page.html.twig',array('form_user_type'=>$form_typeuser->createView()));
    }

    public function annonceAction(){

        return $this->render('UserBundle::poster_job.html.twig');
    }
    public function ListeAnnoncesAction(){

        return $this->render('UserBundle::Annonces.html.twig');
    }


}
