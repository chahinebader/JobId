<?php
/**
 * Created by PhpStorm.
 * User: chahi
 * Date: 8/2/2018
 * Time: 12:13 PM
 */
namespace Experience\Form;

use ExperienceBundle\Entity\Experience;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('details', TextType::class)
            ->add('titre', TextType::class)
            ->add('datedebut', DateType::class)
            ->add('datefin', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'valider'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
    public function __construct()
    {

    }
}