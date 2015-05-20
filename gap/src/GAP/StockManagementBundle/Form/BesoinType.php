<?php

namespace GAP\StockManagementBundle\Form;

use Symfony\Component\DependencyInjection\Compiler\ServiceReferenceGraph;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use GAP\StockManagementBundle\Entity\MoleculeRepository;
use GAP\StockManagementBundle\Entity\ServiceRepository;

class BesoinType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantite'   ,'integer')
            ->add('description','text')
            ->add('dosage'     ,'text')
            ->add('service'    , 'entity', array(
                  'class'         => 'GAPStockManagementBundle:Service',
                  'property'      => 'nom',
                  'query_builder' => function(ServiceRepository $repo) {
                        return $repo->getServiceQuery();
                  }
                ))
            ->add('molecule', 'entity', array(
                  'class'         => 'GAPStockManagementBundle:Molecule',
                  'property'      => 'nomMol',
                  'query_builder' => function(MoleculeRepository $repo) {
                        return $repo->getMoleculeQuery();
                  }
            ))
            ->add('envoyer', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GAP\StockManagementBundle\Entity\Besoin'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gap_stockmanagementbundle_besoin';
    }
}
