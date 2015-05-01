<?php

namespace GAP\StockManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Molecule
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GAP\StockManagementBundle\Entity\MoleculeRepository")
 */
class Molecule
{
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
     * @ORM\Column(name="nomMol", type="string", length=255)
     */
    private $nomMol;

    /**
     * @var string
     *
     * @ORM\Column(name="refMol", type="string", length=255)
     */
    private $refMol;

    /**
     * @var string
     *
     * @ORM\Column(name="etatMol", type="string", length=255)
     */
    private $etatMol;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomMol
     *
     * @param string $nomMol
     * @return Molecule
     */
    public function setNomMol($nomMol)
    {
        $this->nomMol = $nomMol;

        return $this;
    }

    /**
     * Get nomMol
     *
     * @return string 
     */
    public function getNomMol()
    {
        return $this->nomMol;
    }

    /**
     * Set refMol
     *
     * @param string $refMol
     * @return Molecule
     */
    public function setRefMol($refMol)
    {
        $this->refMol = $refMol;

        return $this;
    }

    /**
     * Get refMol
     *
     * @return string 
     */
    public function getRefMol()
    {
        return $this->refMol;
    }

    /**
     * Set etatMol
     *
     * @param string $etatMol
     * @return Molecule
     */
    public function setEtatMol($etatMol)
    {
        $this->etatMol = $etatMol;

        return $this;
    }

    /**
     * Get etatMol
     *
     * @return string 
     */
    public function getEtatMol()
    {
        return $this->etatMol;
    }
}
