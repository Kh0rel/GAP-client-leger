<?php

namespace GAP\StockManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GAP\StockManagementBundle\Entity\CommandeRepository")
 */
class Commande
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    /**
     * @ORM\ManytoOne(targetEntity="GAP\StockManagementBundle\Entity\distributeur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $distributeur;
    /**
     * @ORM\ManyToOne(targetEntity="GAP\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    public function __construct() {
        $this->date = new \DateTime(); 
    }
    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set distributeur
     *
     * @param \GAP\StockManagementBundle\Entity\distributeur $distributeur
     * @return Commande
     */
    public function setDistributeur(\GAP\StockManagementBundle\Entity\distributeur $distributeur)
    {
        $this->distributeur = $distributeur;

        return $this;
    }

    /**
     * Get distributeur
     *
     * @return \GAP\StockManagementBundle\Entity\distributeur 
     */
    public function getDistributeur()
    {
        return $this->distributeur;
    }

    /**
     * Set user
     *
     * @param \GAP\UserBundle\Entity\User $user
     * @return Commande
     */
    public function setUser(\GAP\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \GAP\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
