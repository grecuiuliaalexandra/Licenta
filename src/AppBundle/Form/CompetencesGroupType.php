<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/15/2016
 * Time: 11:32 AM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class CompetencesGroupType extends AbstractType
{/**
 * @param FormBuilderInterface $builder
 * @param array $options
 */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name');
        $builder->add('competences', CollectionType::class, array(
            'entry_type' => CompetencesType::class
        ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CompetencesGroup',
        ));

    }
}
