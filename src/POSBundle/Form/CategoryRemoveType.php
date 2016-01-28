<?php
/**
 * Created by PhpStorm.
 * User: thelinhuk
 * Date: 27/01/2016
 * Time: 21:52
 */

namespace POSBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CategoryRemoveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,array(
                'label' => ' ',
                'required' => false,
                'disabled'  => true))
            ->add('remove',SubmitType::class,array('label' => 'Remove'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'POSBundle\Entity\Category'
        ));
    }


}