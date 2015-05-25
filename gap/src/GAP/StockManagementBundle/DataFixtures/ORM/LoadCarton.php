<?php
// src/OC/UserBundle/DataFixtures/ORM/LoadUser.php

namespace GAP\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GAP\StockManagementBundle\Entity\Medicament;

class LoadMedicament implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Les noms d'utilisateurs à créer
        $listNomMed = array('doliprane', 'vogalene', 'hibuprophene');
        $listrefMed = array('45EFFXAE4','23XXEAZEFS', '25TGSEGTY');
        $listType = array('liquide','gazeux', 'Gellule');
        $listQuarantaine = array('false','false','false');
        $listStockMini = array('12','13','22');
        $listStockCritique = array('4','5','10');
        $listDosage = array('500mg','1000mg','500mg');


        for ($i = 0; $i < 3; $i++) {
            // On crée l'utilisateur
            $medicament = new Medicament();

            // Le nom d'utilisateur et le mot de passe sont identiques
            $medicament->setNomMed($listNomMed[$i]);
            $medicament->setRefMed($listrefMed[$i]);
            $medicament->setTypeMed($listType[$i]);
            $medicament->setQuarantaine($listQuarantaine[$i]);
            $medicament->setStockMini($listStockMini[$i]);
            $medicament->setStockCritique($listStockCritique[$i]);
            $medicament->setDosage($listDosage[$i]);
            // On le persiste
            $manager->persist($medicament);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }
}