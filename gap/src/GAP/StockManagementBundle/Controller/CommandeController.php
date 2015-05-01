<?php

/**
 * Description of CommandeController
 *
 * @author shemana
 */

namespace GAP\StockManagementBundle\Controller;

use GAP\StockManagementBundle\Entity\Besoin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CommandeController extends Controller {

    /**
     * 
     * @Route("/commande", name="commande_board")
     * @Template("GAPStockManagementBundle:Dashboard:commande.html.twig")
     * 
     * @param Request $request
     */
    public function addAction(Request $request) {

        $besoin = new Besoin();

        $formBuilder = $this->createFormBuilder($besoin);

        //We add parameters of entity where we would like Form
        $formBuilder
                ->add('description', 'text')
                ->add('quantite', 'integer')
                ->add('dosage', 'text')
                ->add('save', 'submit');
        
        $form = $formBuilder->getForm();
        
        $form->handleRequest($request);
        
        if($form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($besoin);
           $em->flush();
           
           $request->getSession()->getFlashBag()->add('notice', 'Bien enregistrée.');
           
           return $this->redirect($this->generateUrl('dashboard_home'));
        }

        return array('form' => $form->createView());
    }

}
