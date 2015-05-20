<?php
// src/OC/UserBundle/DataFixtures/ORM/LoadUser.php

namespace GAP\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GAP\StockManagementBundle\Entity\Service;

class LoadService implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Les noms d'utilisateurs à créer
        $listNomService = array('urgence', 'chirurgie', 'maternité');
        $listCommentaire = array('Service Priorisé','Service long terme', 'Besoin lèger');
        $listResponsable = array('Mr Doe','Mr Smith', 'Mlle delores');

        foreach ($listNomService as $name) {
            // On crée l'utilisateur
            $service = new Service();

            // Le nom d'utilisateur et le mot de passe sont identiques
            $service->setNom($name);
            foreach($listCommentaire as $commentaire) {
                $service->setCommentaire($commentaire);
            } foreach($listResponsable as $resp) {
                $service->setResponsable($resp);
            }
            // On le persiste
            $manager->persist($service);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }
}