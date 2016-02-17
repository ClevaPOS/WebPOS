<?php
/**
 * Created by PhpStorm.
 * User: thelinhuk
 * Date: 21/01/2016
 * Time: 23:03
 */

namespace TestBundle\Form\Type;



use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class);
        $builder->add('tags', CollectionType::class, array(
            'entry_type' => TagType::class,
            'allow_add'    => true,
            'by_reference' => false,
            'allow_delete' => true,
        ));
        $builder->add('submit', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TestBundle\Entity\Task',
        ));
    }

    public function getName()
    {
        return 'Task';
    }

}