<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function AdminpanelAction()
    {
        return $this->render('UserBundle::LayoutAdmin.html.twig');
    }

    public function ListeUsersAction()
    {
        $em = $this->get('doctrine')->getManager();
        $list_users = $em->getRepository("UserBundle:User")->findAll();
        return $this->render('UserBundle::AdminListeComptes.html.twig',array('users_list' => $list_users));
    }
    public function ChangerCompteAction($id)
    {
        $em = $this->get('doctrine')->getManager();
        $user= $em->getRepository("UserBundle:User")->find($id);
        $user_status = $user->isEnabled();
        $user = $user->setEnabled(!$user_status);
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('admin_list_users');
    }

    public function AfficherStatistiquesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $total_users = $em->getRepository('UserBundle:User')->GetTotalUsers();
        $total_users_banned = $em->getRepository('UserBundle:User')->GetTotalUsersBanned();
        $total_users_notbanned = $em->getRepository('UserBundle:User')->GetTotalUsersNotBanned();
        $total_users_freelancers = $em->getRepository('UserBundle:User')->GetTotalUsersFreelancers();
       /* $total_users_levelone = $em->getRepository('UserBundle:User')->GetTotalUsersLevelone();
        $total_users_leveltwo = $em->getRepository('UserBundle:User')->GetTotalUsersLeveltwo();
        $total_users_levelthree = $em->getRepository('UserBundle:User')->GetTotalUsersLevelthree(); */

        $percent_users_banned = ($total_users_banned/$total_users) * 100 ;
        $percent_users_notbanned = ($total_users_notbanned/$total_users) * 100 ;
/*        $percent_users_levelone = ($total_users_freelancers/$total_users_levelone) *100 ;
        $percent_users_leveltwo = ($total_users_freelancers/$total_users_leveltwo) *100 ;
        $percent_users_levelthree = ($total_users_freelancers/$total_users_levelthree) *100 ;*/


        return $this->render('UserBundle::AdminStatistiques.html.twig',array('total_users' => $total_users,
            'total_users_banned' => $percent_users_banned,'total_users_notbanned' => $percent_users_notbanned,/*
            'percent_users_levelone' => $percent_users_levelone,
            'percent_users_leveltwo' => $percent_users_leveltwo,'percent_users_levelthree' => $percent_users_levelthree*/));
    }

    public function FindUserByUsernameAction(Request $request)
    {
        $data = $request->request->get('search');
        $banned = $request->request->get('isbanned');
        $notbanned = $request->request->get('isnotbanned');


        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p FROM UserBundle:User p
    WHERE p.username LIKE :data') /*AND p.enabled = banned AND p.enabled= notbanned*/
            ->setParameter('data',$data)/*->setParameter('isbanned',$banned)->setParameter('notbanned',$notbanned)*/;


        $res = $query->getResult();

        return $this->render('@User/AdminListeComptesByCritere.html.twig', array(
            'users_list' => $res));
    }



}
