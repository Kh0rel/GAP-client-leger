<?php

namespace GAP\StockManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GAP\StockManagementBundle\Entity\Besoin;

class IndexController extends Controller {

    /**
     * @Route("/", name="dashboard_home")
     * @Template("GAPStockManagementBundle:Dashboard:index.html.twig")
     */
    public function indexAction() {
        
        return array();
    }

    /**
     * @Route("", name="modal_commande")
     */
    public function modalAction() {

        return array();
    }

}
