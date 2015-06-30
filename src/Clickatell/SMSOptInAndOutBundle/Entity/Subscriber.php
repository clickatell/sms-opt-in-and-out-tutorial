<?php

namespace Clickatell\SMSOptInAndOutBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscriber
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Subscriber
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
     * @ORM\Column(name="msisdn", type="string", length=32)
     */
    private $msisdn;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;


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
     * Set msisdn
     *
     * @param string $msisdn
     * @return Subscriber
     */
    public function setMsisdn($msisdn)
    {
        $this->msisdn = $msisdn;

        return $this;
    }

    /**
     * Get msisdn
     *
     * @return string 
     */
    public function getMsisdn()
    {
        return $this->msisdn;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Subscriber
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Subscriber
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * __toString
     *
     * @return string
     */
    function __toString()
    {
        return json_encode(array(
            $this->getId(),
            $this->getMsisdn(),
            $this->getName()
        ), true);
    }

}
