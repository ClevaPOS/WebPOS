<?php
/**
 * Created by PhpStorm.
 * User: thelinhuk
 * Date: 21/01/2016
 * Time: 22:52
 */

namespace TestBundle\Form\Type;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class TagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TestBundle\Entity\Tag',
        ));
    }

    public function getName()
    {
        return 'Tag';
    }

}