<?php

namespace UIR\CasanetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('country', 'country')
            ->add('startdate', 'date', array(
                "widget" => "single_text",
                "format" => "dd/MM/yyyy",
            ))
            ->add('enddate', 'date', array(
                "widget" => "single_text",
                "format" => "dd/MM/yyyy",
            ))
            ->add('des','textarea')
            ->add('url','url')
            ->add('members','collection',array(
                "type" => "text",
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UIR\CasanetBundle\Entity\Event'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'uir_casanetbundle_event';
    }
}
