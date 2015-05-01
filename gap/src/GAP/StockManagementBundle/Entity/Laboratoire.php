<?php

namespace GAP\StockManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Laboratoire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GAP\StockManagementBundle\Entity\LaboratoireRepository")
 */
class Laboratoire
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
     * @ORM\Column(name="nomLabo", type="string", length=255)
     */
    private $nomLabo;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseLabo", type="string", length=255)
     */
    private $adresseLabo;

    /**
     * @var string
     *
     * @ORM\Column(name="cpLabo", type="string", length=255)
     */
    private $cpLabo;

    /**
     * @var string
     *
     * @ORM\Column(name="villeLabo", type="string", length=255)
     */
    private $villeLabo;

    /**
     * @var string
     *
     * @ORM\Column(name="contactLabo", type="string", length=255)
     */
    private $contactLabo;

    /**
     * @var string
     *
     * @ORM\Column(name="mailLabo", type="string", length=255)
     */
    private $mailLabo;

    /**
     * @var string
     *
     * @ORM\Column(name="telephoneLabo", type="string", length=255)
     */
    private $telephoneLabo;


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
     * Set nomLabo
     *
     * @param string $nomLabo
     * @return Laboratoire
     */
    public function setNomLabo($nomLabo)
    {
        $this->nomLabo = $nomLabo;

        return $this;
    }

    /**
     * Get nomLabo
     *
     * @return string 
     */
    public function getNomLabo()
    {
        return $this->nomLabo;
    }

    /**
     * Set adresseLabo
     *
     * @param string $adresseLabo
     * @return Laboratoire
     */
    public function setAdresseLabo($adresseLabo)
    {
        $this->adresseLabo = $adresseLabo;

        return $this;
    }

    /**
     * Get adresseLabo
     *
     * @return string 
     */
    public function getAdresseLabo()
    {
        return $this->adresseLabo;
    }

    /**
     * Set cpLabo
     *
     * @param string $cpLabo
     * @return Laboratoire
     */
    public function setCpLabo($cpLabo)
    {
        $this->cpLabo = $cpLabo;

        return $this;
    }

    /**
     * Get cpLabo
     *
     * @return string 
     */
    public function getCpLabo()
    {
        return $this->cpLabo;
    }

    /**
     * Set villeLabo
     *
     * @param string $villeLabo
     * @return Laboratoire
     */
    public function setVilleLabo($villeLabo)
    {
        $this->villeLabo = $villeLabo;

        return $this;
    }

    /**
     * Get villeLabo
     *
     * @return string 
     */
    public function getVilleLabo()
    {
        return $this->villeLabo;
    }

    /**
     * Set contactLabo
     *
     * @param string $contactLabo
     * @return Laboratoire
     */
    public function setContactLabo($contactLabo)
    {
        $this->contactLabo = $contactLabo;

        return $this;
    }

    /**
     * Get contactLabo
     *
     * @return string 
     */
    public function getContactLabo()
    {
        return $this->contactLabo;
    }

    /**
     * Set mailLabo
     *
     * @param string $mailLabo
     * @return Laboratoire
     */
    public function setMailLabo($mailLabo)
    {
        $this->mailLabo = $mailLabo;

        return $this;
    }

    /**
     * Get mailLabo
     *
     * @return string 
     */
    public function getMailLabo()
    {
        return $this->mailLabo;
    }

    /**
     * Set telephoneLabo
     *
     * @param string $telephoneLabo
     * @return Laboratoire
     */
    public function setTelephoneLabo($telephoneLabo)
    {
        $this->telephoneLabo = $telephoneLabo;

        return $this;
    }

    /**
     * Get telephoneLabo
     *
     * @return string 
     */
    public function getTelephoneLabo()
    {
        return $this->telephoneLabo;
    }
}
