<?php

namespace GAP\StockManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Medicament
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GAP\StockManagementBundle\Entity\MedicamentRepository")
 */
class Medicament {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMed", type="string", length=255)
     */
    private $nomMed;

    /**
     * @var string
     *
     * @ORM\Column(name="refMed", type="string", length=255)
     */
    private $refMed;


    /**
     * @var string
     *
     * @ORM\Column(name="typeMed", type="string", length=255)
     */
    private $typeMed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="quarantaine", type="boolean")
     */
    private $quarantaine;

    /**
     * @var string
     *
     * @ORM\Column(name="stockMini", type="string", length=255)
     */
    private $stockMini;

    /**
     * @var integer
     *
     * @ORM\Column(name="stockCritique", type="integer")
     */
    private $stockCritique;

    /**
     * @var string
     *
     * @ORM\Column(name="dosage", type="string", length=255)
     */
    private $dosage;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;
    /**
     * @ORM\ManyToMany(targetEntity="GAP\StockManagementBundle\Entity\molecule", cascade={"persist"})
     */
    private $molecules;
    
    /**
     * @ORM\ManyToOne(targetEntity="GAP\StockManagementBundle\Entity\Laboratoire")
     */
    private $laboratoire;

    
    /**
     * Construct
     */
    public function __construct() {
        $this->molecules = new ArrayCollection();
    }
    /**
     * Add Molecules
     */
    public function addMolecule(Molecule $molecule) {
        $this->molecules[] = $molecule;
        
        return $this;
    }
    
    public function removeMolecule(Molecule $molecule) {
        $this->molecules->removeElement($molecule);
    }
    
    public function getMolecules() {
        return $this->molecules;
    }
    
    public function getLaboratoire() {
        return $this->laboratoire;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nomMed
     *
     * @param string $nomMed
     * @return Medicament
     */
    public function setNomMed($nomMed) {
        $this->nomMed = $nomMed;

        return $this;
    }

    /**
     * Get nomMed
     *
     * @return string 
     */
    public function getNomMed() {
        return $this->nomMed;
    }

    /**
     * Set refMed
     *
     * @param string $refMed
     * @return Medicament
     */
    public function setRefMed($refMed) {
        $this->refMed = $refMed;

        return $this;
    }

    /**
     * Get refMed
     *
     * @return string 
     */
    public function getRefMed() {
        return $this->refMed;
    }

    /**
     * Set marqueMed
     *
     * @param string $marqueMed
     * @return Medicament
     */
    public function setMarqueMed($marqueMed) {
        $this->marqueMed = $marqueMed;

        return $this;
    }

    /**
     * Get marqueMed
     *
     * @return string 
     */
    public function getMarqueMed() {
        return $this->marqueMed;
    }

    /**
     * Set typeMed
     *
     * @param string $typeMed
     * @return Medicament
     */
    public function setTypeMed($typeMed) {
        $this->typeMed = $typeMed;

        return $this;
    }

    /**
     * Get typeMed
     *
     * @return string 
     */
    public function getTypeMed() {
        return $this->typeMed;
    }

    /**
     * Set quarantaine
     *
     * @param boolean $quarantaine
     * @return Medicament
     */
    public function setQuarantaine($quarantaine) {
        $this->quarantaine = $quarantaine;

        return $this;
    }

    /**
     * Get quarantaine
     *
     * @return boolean 
     */
    public function getQuarantaine() {
        return $this->quarantaine;
    }

    /**
     * Set stockMini
     *
     * @param string $stockMini
     * @return Medicament
     */
    public function setStockMini($stockMini) {
        $this->stockMini = $stockMini;

        return $this;
    }

    /**
     * Get stockMini
     *
     * @return string 
     */
    public function getStockMini() {
        return $this->stockMini;
    }

    /**
     * Set stockCritique
     *
     * @param integer $stockCritique
     * @return Medicament
     */
    public function setStockCritique($stockCritique) {
        $this->stockCritique = $stockCritique;

        return $this;
    }

    /**
     * Get stockCritique
     *
     * @return integer 
     */
    public function getStockCritique() {
        return $this->stockCritique;
    }

    /**
     * Set dosage
     *
     * @param string $dosage
     * @return Medicament
     */
    public function setDosage($dosage) {
        $this->dosage = $dosage;

        return $this;
    }

    /**
     * Get dosage
     *
     * @return string 
     */
    public function getDosage() {
        return $this->dosage;
    }


    /**
     * Set laboratoire
     *
     * @param \GAP\StockManagementBundle\Entity\Laboratoire $laboratoire
     * @return Medicament
     */
    public function setLaboratoire(\GAP\StockManagementBundle\Entity\Laboratoire $laboratoire = null)
    {
        $this->laboratoire = $laboratoire;

        return $this;
    }

    /**
     * Set carton
     *
     * @param \GAP\StockManagementBundle\Entity\Carton $carton
     * @return Medicament
     */
    public function setCarton(\GAP\StockManagementBundle\Entity\Carton $carton)
    {
        $this->carton = $carton;

        return $this;
    }

    /**
     * Get carton
     *
     * @return \GAP\StockManagementBundle\Entity\Carton 
     */
    public function getCarton()
    {
        return $this->carton;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Medicament
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}
