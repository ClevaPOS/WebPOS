<?php
/**
 * Created by PhpStorm.
 * User: thelinhuk
 * Date: 22/03/2016
 * Time: 23:16
 */

namespace TestBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description');
        $builder->add('tags', 'collection', array('type' => new TagType()));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Acme\TaskBundle\Entity\Task',
        );
    }

    public function getName()
    {
        return 'task';
    }
}