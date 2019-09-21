<?php
/**
 * Created by PhpStorm.
 * User: chahi
 * Date: 8/1/2018
 * Time: 12:20 PM
 */

namespace FormationBundle\Controller;

use FormationBundle\Entity\Format;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class FormatController extends Controller
{
    public function AddFormationAction(Request $request)
    {


        // creates a task and gives it some dummy data for this example
        $task = new Format();
        $task->setTitre('mettez titre ici');
        $task->setDetails('mettez details');
        $task->setGroupe('mettez groupe');

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
            ->add('groupe', TextType::class)
            ->add('datedebut', DateType::class)
            ->add('datefin', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Ajouter formation'))
            ->getForm();
        $form_exp->handleRequest($request);

        if ($form_exp->isSubmitted() && $form_exp->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form_exp->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('fos_user_profile_show');
        }
///'users'=> $user_creditentials for tomorrow
        return $this->render('FormationBundle::EditFormation.html.twig', array(
            'form_exp' => $form_exp->createView(), 'experiences' => $experiences,'formations' => $formations
        ));
    }
}