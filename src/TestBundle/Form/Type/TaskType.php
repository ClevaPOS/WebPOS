<?php
/**
 * Created by PhpStorm.
 * User: thelinhuk
 * Date: 21/01/2016
 * Time: 23:03
 */

namespace TestBundle\Form\Type;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description');

        $builder->add('tags', CollectionType::class, array(
            'entry_type' => TagType::class
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TestBundle\Entity\Task',
        ));
    }
}