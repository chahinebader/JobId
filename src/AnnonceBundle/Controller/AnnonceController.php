<?php

namespace AnnonceBundle\Controller;


use AnnonceBundle\Entity\Proposition;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use AnnonceBundle\Entity\Annonce;
use UserBundle\Entity\User;

class AnnonceController extends Controller
{

    public function AjoutAnnonceAction(Request $request){
        $annonce = new Annonce();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $annonce->setUser($user);



        $form_annonce = $this->createFormBuilder($annonce)
            ->add('titre', TextType::class)
            ->add('service', ChoiceType::class, array(
                'choices' => array(
                    'Graphisme' => 'graphisme',
                    'Motion Design' => 'Motion Design',
                    'Développement' => 'Développement',
                ),))
            ->add('typedoc', ChoiceType::class, array(
                'choices' => array(
                    'Word' => 'word',
                    'Pdf' => 'pdf',
                    'Image' => 'image',
                    'Excel' => 'excel',
                ),))
            ->add('largeur', TextType::class)
            ->add('longeur', TextType::class)
            ->add('recto_verso', RadioType::class)
            ->add('description_annonce', TextareaType::class, array('attr' => array('rows' => '50','cols' => '50')))
            //->add('fichier', File::class)
            //->add('competance_annonce', DateType::class)
            //->add('budget', DateType::class)
            ->add('duree', TimeType::class,array('widget'=>'choice'))
            ->add('save', SubmitType::class, array('label' => 'Valider votre Annonce'))
            ->getForm();
        $form_annonce->handleRequest($request);


        if ($form_annonce->isSubmitted() && $form_annonce->isValid()) {
            $annonce = $form_annonce->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            return $this->redirectToRoute('annonce');
        }

/*        $ann= $ann = $this->getDoctrine()->getRepository('AnnonceBundle:Annonce')->findBy(array('user'=>$user->getId()));*/
        return $this->render('@Annonce/Annonces/poster_job.html.twig', array('form_annonce'=>$form_annonce->createView()));

    }


    public function show_annoncesAction()
    {
        $annonces =$this->getDoctrine()
            ->getRepository(Annonce::class)
            ->findAll();
        return $this->render('AnnonceBundle:Annonces:Annonces.html.twig', array('a' => $annonces));
    }

    public function details_annonceAction(Request $request,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $userConnected = $this->container->get('security.token_storage')->getToken()->getUser();
        $idUser = $this->container->get('security.token_storage')->getToken()->getUser()->getId();


        ///////////////////////////recupération meilleur prix ( le plus bas ) ///////////////////////////

        $proposition=$this->getDoctrine()->getRepository(Proposition::class)->MinProposition($id);

        /////////////////////////////////Test si user a deja proposer une proposition/////////////////////
        $bool = true;
        $messageErreur = null;
        $ancienneProposition=$this->getDoctrine()->getRepository(Proposition::class)->AncienneProposition($idUser,$id);
        if ($ancienneProposition!=null) {
            $bool = false;
            $messageErreur = "Vous avez déjà proposer un prix !";
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////

        $objAff1=$this->getDoctrine()->getRepository(Annonce::class)->find($id);
        if ($objAff1->getId() == $userConnected->getId())
            {$objAff=$this->getDoctrine()->getRepository(Annonce::class)->find($id);}
        else
        {
            $this->getDoctrine()->getRepository(Annonce::class)->AugumenterNbVue($id);
            $objAff=$this->getDoctrine()->getRepository(Annonce::class)->find($id);
        }

        /////////////////////////Ajout proposition////////////////////////////////////////////////////////
        $proposition1 = new Proposition();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $proposition1->setUser($user);
        $time = date('H:i:s \O\n d/m/Y');
        $proposition1->setDateTime($time);
        $em = $this->getDoctrine()->getManager();
        $annonce=$this->getDoctrine()->getRepository(Annonce::class)->find($id);
        $proposition1->setAnnonce($annonce);

        $form_proposition= $this->createFormBuilder($proposition1)
            ->add('propositionPrix', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();
        $form_proposition->handleRequest($request);


        if ($form_proposition->isSubmitted() && $form_proposition->isValid() && $bool) {

            $prop = $form_proposition->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prop);
            $entityManager->flush();

            return $this->redirectToRoute('show_annonces');
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////




        return $this->render('AnnonceBundle:Annonces:DetailsAnnonce.html.twig',
            array(
                'annonce'=> $objAff,
                'form_prop' => $form_proposition->createView(),
                'proposition'=>$proposition,'messageErreur'=>$messageErreur
        ));
    }




    public function ListeAnnoncesAction(){

        $user = $this->container->get('security.token_storage')->getToken()->getUser();


        $annonce =$this->getDoctrine() -> getRepository(Annonce::class) -> findAnnonceByUser($user);
        return $this->render('AnnonceBundle:Annonces:Annonces_client.html.twig', array('a' => $annonce));
    }

}
