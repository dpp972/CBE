<?php

namespace Dpp\Cbe\AdministrationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('mediafile', 'file', array('data_class'=>null))
            ->add('dateDebut')
            ->add('dateFin')
            ->add('note')
            ->add('showTitre')
            ->add('showDescription')
            ->add('showDate')
            ->add('showNote')
            ->add('showTitreOnHover')
            ->add('showDescriptionOnHover')
            ->add('showDateOnHover')
            ->add('showNoteOnHover')
            ->add('article')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dpp\Cbe\MainBundle\Entity\News'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dpp_cbe_mainbundle_news';
    }
}
