<?php
/**
 * Created by PhpStorm.
 * User: vphucpham
 * Date: 5/27/16
 * Time: 10:31 AM
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;



class TaskType extends AbstractType
{
    function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description', EntityType::class,array(
            'class' => 'AppBundle:Task',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('d');
            },));

        $builder->add('tags', CollectionType::class, array(
            'entry_type' => TagType::class,
            'allow_add'    => true,
            'by_reference' => false,
        ));

        $builder->add('save', SubmitType::class, array('label' => 'Save'));

    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task',
        ));
    }

}