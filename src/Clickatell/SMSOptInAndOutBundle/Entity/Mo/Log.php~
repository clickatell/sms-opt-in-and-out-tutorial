<?php

namespace Clickatell\SMSOptInAndOutBundle\Entity\Mo;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clickatell\SMSOptInAndOutBundle\Entity\Mo\LogRepository")
 */
class Log
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
     * @var integer
     *
     * @ORM\Column(name="api_id", type="integer")
     */
    private $apiId;

    /**
     * @var string
     *
     * @ORM\Column(name="msg_id", type="string", length=255)
     */
    private $msgId;

    /**
     * @var string
     *
     * @ORM\Column(name="sender", type="string", length=32)
     */
    private $sender;

    /**
     * @var string
     *
     * @ORM\Column(name="receiver", type="string", length=32)
     */
    private $receiver;

    /**
     * @var integer
     *
     * @ORM\Column(name="timestamp", type="integer")
     */
    private $timestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="network", type="string", length=128)
     */
    private $network;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;


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
     * Set apiId
     *
     * @param integer $apiId
     * @return Log
     */
    public function setApiId($apiId)
    {
        $this->apiId = $apiId;

        return $this;
    }

    /**
     * Get apiId
     *
     * @return integer 
     */
    public function getApiId()
    {
        return $this->apiId;
    }

    /**
     * Set msgId
     *
     * @param string $msgId
     * @return Log
     */
    public function setMsgId($msgId)
    {
        $this->msgId = $msgId;

        return $this;
    }

    /**
     * Get msgId
     *
     * @return string 
     */
    public function getMsgId()
    {
        return $this->msgId;
    }

    /**
     * Set sender
     *
     * @param string $sender
     * @return Log
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return string 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set receiver
     *
     * @param string $receiver
     * @return Log
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get receiver
     *
     * @return string 
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set timestamp
     *
     * @param integer $timestamp
     * @return Log
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return integer 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set network
     *
     * @param string $network
     * @return Log
     */
    public function setNetwork($network)
    {
        $this->network = $network;

        return $this;
    }

    /**
     * Get network
     *
     * @return string 
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Log
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
}
