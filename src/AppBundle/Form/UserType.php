<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('birthdayType', BirthdayType::class)
            ->add('email', EmailType::class)
            ->add('gender', ChoiceType::class, array(
                'choices' => array('Male' => true,'Female' => false)))
            ->add('country', ChoiceType::class, array(
                'choices' => array('France' => true,'Canada' => false)))
            ->add('job', ChoiceType::class, array(
                'choices' => array('Cadre' => true,'Cuistot' => false)))
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
