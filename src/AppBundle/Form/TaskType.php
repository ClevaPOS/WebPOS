<?php
/**
 * Created by PhpStorm.
 * User: vphucpham
 * Date: 5/2/16
 * Time: 2:24 PM
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;






class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
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