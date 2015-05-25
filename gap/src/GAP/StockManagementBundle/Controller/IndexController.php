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
     * @Route("/", name="gap.dashboard_home")
     * @Template("GAPStockManagementBundle:Dashboard:index.html.twig")
     */
    public function indexAction(Request $request) {

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

        $listWaitingOrder = $this->getDoctrine()->getManager()
            ->getRepository("GAPStockManagementBundle:Besoin")
            ->getAll();

        $listYourOrder = $this->getDoctrine()->getManager()
            ->getRepository("GAPStockManagementBundle:Besoin")
            ->getAllByUser($this->get('security.context')->getToken()
                ->getUser()->getId());

        $listAlert = $this->getDoctrine()->getManager()
            ->getRepository("GAPStockManagementBundle:Medicament")
            ->findAll();



        return array('listCommandes' => $listWaitingOrder,
                     'listYourCommandes' => $listYourOrder,
                     'listAlert' => $listAlert,
                     'form' => $formBesoin->createView());
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
    /**
     * @Route("/commande/affecter/{id}", name="gap.affecter")
     */
    public function affectAction($id) {

            $em = $this->getDoctrine()->getManager();
            $OrderRepository = $em->getRepository('GAPStockManagementBundle:Besoin');
            $UserRepository = $em->getRepository('GAPUserBundle:User');
            $besoin = $OrderRepository->find($id);
            $user = $UserRepository->find($this->get('security.context')->getToken()
                                               ->getUser()->getId());

            $besoin->setUser($user);

            $em->persist($besoin);

            $em->flush();

        return $this->redirect($this->generateUrl('gap.dashboard_home'));
    }

    /**
     * @Route("/ycommande/valider/{id}", name="gap.valid")
     */
    public function validOrderAction($id) {

        $em = $this->getDoctrine()->getManager();
        $OrderRepository = $em->getRepository('GAPStockManagementBundle:Besoin');
        $besoin = $OrderRepository->find($id);

        $besoin->setValid(true);

        $em->persist($besoin);

        $em->flush();

        return $this->redirect($this->generateUrl('gap.dashboard_home'));
    }
}
