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
        $listWaitingOrder = $this->getDoctrine()->getManager()
                            ->getRepository("GAPStockManagementBundle:Besoin")
                            ->getAll();
        $listYourOrder = $this->getDoctrine()->getManager()
                            ->getRepository("GAPStockManagementBundle:Besoin")
                            ->getAllByUser($this->get('security.context')->getToken()
                                            ->getUser()->getId());
        $listAlert = $this->getDoctrine()->getManager()
                                ->getRepository("GAPStockManagementBundle:Medicament")
                                ->getAll();

        //création du formulaire
        $besoin = new besoin();
        $formBesoin = $this->get('form.factory')->create(new BesoinType(), $besoin);
        // Soumission du formulaire
        if($formBesoin->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($besoin);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Commande bien enregistrée.');
        }


        return array('listCommandes' => $listWaitingOrder,
                     'listYourCommandes' => $listYourOrder,
                     'listAlert' => $listAlert,
                     'form' => $formBesoin->createView());
    }

    /**
     * @Route("/refresh/waitingOrder", name="GAP.Display.Waiting.Order", options={"expose" = true})
     */
    public function refreshWaitingOrderAction() {
            $listWaitingOrder = $this->getDoctrine()->getManager()
                                ->getRepository("GAPStockManagementBundle:Besoin")
                                ->getAllByNoAffect();
        return array();
    }

    /**
     * @Route("/commande", name="gap.commande")
     * @Template("GAPStockManagementBundle:Dashboard:commande.html.twig")
     */
    public function commandeAction() {
        $listWaitingOrder = $this->getDoctrine()->getManager()
                                ->getRepository("GAPStockManagementBundle:Besoin")
                                ->getAll();



        return array('listCommandes' => $listWaitingOrder);
    }
    /**
     * @Route("/ycommande", name="gap.your.commande")
     * @Template("GAPStockManagementBundle:Dashboard:yCommande.html.twig")
     */
    public function yourCommandeAction() {
        $listYourOrder = $this->getDoctrine()->getManager()
            ->getRepository("GAPStockManagementBundle:Besoin")
            ->getAllByUser($this->get('security.context')->getToken()
                ->getUser()->getId());



        return array('listCommandes' => $listYourOrder);
    }


}
