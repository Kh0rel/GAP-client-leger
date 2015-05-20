<?php

namespace GAP\StockManagementBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GAP\StockManagementBundle\Entity\Besoin;
use GAP\StockManagementBundle\Form\BesoinType;
use Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;


class IndexController extends Controller {

    /**
     * @Route("/", name="dashboard_home")
     * @Template("GAPStockManagementBundle:Dashboard:index.html.twig")
     */
    public function indexAction(Request $request) {
        $listCommande = $this->getDoctrine()->getManager()
                            ->getRepository("GAPStockManagementBundle:Besoin")
                            ->getAll();

        $besoin = new besoin();
        $formBesoin = $this->get('form.factory')->create(new BesoinType(), $besoin);

        if($formBesoin->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($besoin);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Commande bien enregistrée.');
        }


        return array('listCommande' => $listCommande,
                     'form' => $formBesoin->createView());
    }

    /**
     * @Route("", name="modal_commande")
     */
    public function modalAction() {

        return array();
    }
    /**
     * @Route("/addCommande", name="GAPAddCommande")
     */
    public function addCommandeAction(Request $request) {


        $this->redirect($this->generateUrl('dashboard_home'), 301);

    }

}
