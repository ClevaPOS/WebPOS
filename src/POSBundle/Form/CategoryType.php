<?php

/**
 * Created by PhpStorm.
 * User: thelinhuk
 * Date: 07/01/2016
 * Time: 20:19
 */

namespace POSBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\DependencyInjection\Container;




class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('category', TextType::class)
            ->add('remove', SubmitType::class, array('label' => 'Remove'))
            ->add('save', SubmitType::class, array('label' => 'Save'))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'POSBundle\Entity\Category'
        ));
    }


    /**
     * Get categories
     *
     * @return array category
     */
    function getCategoryList()
    {
        $orm = new ORM();

        $category = $this->getDoctrine()
            ->getRepository('POSBundle:Category')
            ->findAll();
        dump($category);
        if (!$category) {
            throw $this->createNotFoundException(
                'No Cateogry is avaiable '
            );
        } else {
            return $category;
        }
    }

}

