<?php

namespace UIR\CasanetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
            ->add('type', 'choice', array(
                "choices" => array(
                    "Article" => "Article",
                    "Chapter" => "Chapter",
                    "Poster" => "Poster",
                    "Report" => "Report",
                )
            ))
            ->add('date', 'date', array(
                "widget" => "single_text",
                "format" => "dd/MM/yyyy"
            ))
            ->add('author', 'text')
            ->add('subject', 'text');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UIR\CasanetBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'uir_casanetbundle_article';
    }
}
