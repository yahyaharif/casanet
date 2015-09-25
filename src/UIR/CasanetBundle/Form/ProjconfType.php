<?php

namespace UIR\CasanetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjconfType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('des', 'textarea')
            ->add('url', 'url');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UIR\CasanetBundle\Entity\Projconf'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'uir_casanetbundle_projconf';
    }
}
