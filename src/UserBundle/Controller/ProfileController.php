<?php
// src/AppBundle/Controller/ProductController.php
namespace UserBundle\Controller;

use ExperienceBundle\Entity\Experience;
use FormationBundle\Entity\Format;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\Competence;
use UserBundle\Entity\Langue;
use UserBundle\Entity\Portfolio;


class ProfileController extends Controller
{
    public function deleteExperienceAction(Experience $expe)
    {
        if (!$expe) {
            throw $this->createNotFoundException('No experience found');
        }
        $em = $this->get('doctrine')->getManager();
        $em->remove($expe);
        $em->flush();

        return $this->redirect($this->generateUrl('fos_user_profile_edit'));
    }

    public function deleteFormationAction(Format $format)
    {
        if (!$format) {
            throw $this->createNotFoundException('No formation found');
        }
        $em = $this->get('doctrine')->getManager();
        $em->remove($format);
        $em->flush();

        return $this->redirect($this->generateUrl('fos_user_profile_edit'));
    }

    public function deleteCompetenceAction(Competence $competence)
    {
        if (!$competence) {
            throw $this->createNotFoundException('No competence found');
        }
        $em = $this->get('doctrine')->getManager();
        $em->remove($competence);
        $em->flush();

        return $this->redirect($this->generateUrl('fos_user_profile_edit'));
    }
    public function deleteLangueAction(Langue $langue)
    {
        if (!$langue) {
            throw $this->createNotFoundException('No formation found');
        }
        $em = $this->get('doctrine')->getManager();
        $em->remove($langue);
        $em->flush();

        return $this->redirect($this->generateUrl('fos_user_profile_edit'));
    }
    public function deletePortfolioAction(Portfolio $portfolio)
    {
        if (!$portfolio) {
            throw $this->createNotFoundException('No formation found');
        }
        $em = $this->get('doctrine')->getManager();
        $em->remove($portfolio);
        $em->flush();

        return $this->redirect($this->generateUrl('fos_user_profile_edit'));
    }


}