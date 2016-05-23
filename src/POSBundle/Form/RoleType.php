<?php
/**
 * Created by PhpStorm.
 * User: vphucpham
 * Date: 5/17/16
 * Time: 3:53 PM
 */

namespace POSBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;





class RoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('role', EntityType::class, array(
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('r')->where('r.id = :id')->setParameter('id', 1);
            },
                'class' => 'POSBundle\Entity\Role',

                'label' => false,
            )
        );

        $builder->add('users', CollectionType::class,array(
            'entry_type' => UserType::class,
            'by_reference' => false,));
        $builder->add('save', SubmitType::class, array('label' => 'Save'));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'POSBundle\Entity\Role',
        ));
    }


}