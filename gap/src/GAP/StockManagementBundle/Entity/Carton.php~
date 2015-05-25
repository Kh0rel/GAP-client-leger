<?php

namespace GAP\StockManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carton
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GAP\StockManagementBundle\Entity\CartonRepository")
 */
class Carton {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_peremption", type="datetime")
     */
    private $datePeremption;

    /**
     * @ORM\ManyToOne(targetEntity="GAP\StockManagementBundle\Entity\Medicament")
     */
    private $medicament;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Carton
     */
    public function setQuantite($quantite) {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite() {
        return $this->quantite;
    }

    /**
     * Set datePeremption
     *
     * @param \DateTime $datePeremption
     * @return Carton
     */
    public function setDatePeremption($datePeremption) {
        $this->datePeremption = $datePeremption;

        return $this;
    }

    /**
     * Get datePeremption
     *
     * @return \DateTime 
     */
    public function getDatePeremption() {
        return $this->datePeremption;
    }


    /**
     * Set medicament
     *
     * @param \GAP\StockManagementBundle\Entity\medicament $medicament
     * @return Carton
     */
    public function setMedicament(\GAP\StockManagementBundle\Entity\medicament $medicament)
    {
        $this->medicament = $medicament;

        return $this;
    }

    /**
     * Get medicament
     *
     * @return \GAP\StockManagementBundle\Entity\medicament 
     */
    public function getMedicament()
    {
        return $this->medicament;
    }
}
