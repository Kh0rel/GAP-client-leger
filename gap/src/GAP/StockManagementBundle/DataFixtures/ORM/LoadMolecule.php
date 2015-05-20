<?php
// src/OC/UserBundle/DataFixtures/ORM/LoadUser.php

namespace GAP\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GAP\StockManagementBundle\Entity\Molecule;

class LoadMolecule implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Les noms d'utilisateurs à créer
        $listNomMol = array('paracetamole', 'Acide', 'Hydrogene');
        $listrefMol = array('45FFXAE4','23XXAZEFS', '25TGSGTY');
        $listEtat = array('liquide','gazeux', 'Gellule');

        for ($i = 0; $i < 3; $i++) {
            // On crée l'utilisateur
            $molecule = new Molecule();

            // Le nom d'utilisateur et le mot de passe sont identiques
            $molecule->setNomMol($listNomMol[$i]);
            $molecule->setRefMol($listrefMol[$i]);
            $molecule->setEtatMol($listEtat[$i]);

            // On le persiste
            $manager->persist($molecule);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }
}