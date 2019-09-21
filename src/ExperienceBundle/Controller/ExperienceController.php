<?php
/**
 * Created by PhpStorm.
 * User: chahi
 * Date: 8/1/2018
 * Time: 12:20 PM
 */

namespace ExperienceBundle\Controller;

use ExperienceBundle\Entity\Experience;
use FOS\UserBundle\Form\Type\ProfileFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ExperienceController extends Controller
{
    public function AddExperienceAction(Request $request)
    {


        // creates a task and gives it some dummy data for this example
        $task = new Experience();
        $task->setDetails('mettez details ici');
        $task->setTitre('mettez titre');

        /// added manually


        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $task->setUser($user);

        $em = $this->get('doctrine')->getManager();
        $experiences = $experiences = $this->getDoctrine() ->getRepository('ExperienceBundle:Experience') ->findBy(array('user' => $user->getId()));
        $formations = $formations = $this->getDoctrine() ->getRepository('FormationBundle:Format') ->findBy(array('user' => $user->getId()));
        //


        $form_exp = $this->createFormBuilder($task)
            ->add('details', TextType::class)
            ->add('titre', TextType::class)
            ->add('datedebut', DateType::class)
            ->add('datefin', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'ajouter experience'))
            ->getForm();
        $form_exp->handleRequest($request);

        if ($form_exp->isSubmitted() && $form_exp->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form_exp->getData();


            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($task);
             $entityManager->flush();
             /*
              * get current user id
              * save user id with exp
              */
          //  $user = $this->getUser();








            return $this->redirectToRoute('fos_user_profile_show');
        }
///'users'=> $user_creditentials for tomorrow
        return $this->render('ExperienceBundle::EditExperience.html.twig', array(
            'form_exp' => $form_exp->createView(), 'experiences' => $experiences,'formations' => $formations
        ));
    }
}