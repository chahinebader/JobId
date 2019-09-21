<?php

namespace DescriptionBundle\Controller;

use DescriptionBundle\Entity\Description;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DescriptionController extends Controller
{



    function deleteDescriptionAction(){

        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        if ($user->getDescription()==null)  return $this->redirectToRoute('fos_user_profile_show');
        else {
            $idDescription=$user->getDescription()->getId();
            $em=$this->getDoctrine()->getManager();
            $description=$em->getRepository("DescriptionBundle:Description")->find($idDescription);
            $user->setDescription(null);
            $em->remove($description);
            $em->flush();
            return $this->redirectToRoute('fos_user_profile_show');
        }

    }

    public function AddDescriptionAction(Request $request)
    {


        // creates a task and gives it some dummy data for this example
        $description = new Description();
        $description->setDetailsDescription('mettez details ici');

        /// added manually


        $user = $this->container->get('security.token_storage')->getToken()->getUser();


        $em = $this->get('doctrine')->getManager();
        $experiences = $experiences = $this->getDoctrine() ->getRepository('ExperienceBundle:Experience') ->findBy(array('user' => $user->getId()));
        $formations = $formations = $this->getDoctrine() ->getRepository('FormationBundle:Format') ->findBy(array('user' => $user->getId()));
        //


        $form_exp = $this->createFormBuilder($description)
            ->add('details', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();
        $form_exp->handleRequest($request);

        if ($form_exp->isSubmitted() && $form_exp->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $description = $form_exp->getData();


            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($description);
            $user->setDescription($description);
            $entityManager->persist($user);
            $entityManager->flush();
            /*
             * get current user id
             * save user id with exp
             */
            //  $user = $this->getUser();

            return $this->redirectToRoute('fos_user_profile_show');
        }
///'users'=> $user_creditentials for tomorrow
        return $this->render('DescriptionBundle::EditDescription.html.twig', array(
            'form_exp' => $form_exp->createView(), 'description'=>$description,'experiences' => $experiences,'formations' => $formations
        ));
    }



}
