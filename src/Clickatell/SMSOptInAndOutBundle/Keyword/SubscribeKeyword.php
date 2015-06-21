<?php
/**
 * Created by PhpStorm.
 * User: JZ
 * Date: 2015/06/21
 * Time: 5:27 PM
 */

namespace Clickatell\SMSOptInAndOutBundle\Keyword;


use Clickatell\SMSOptInAndOutBundle\Entity\Subscriber;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManager;

class SubscribeKeyword implements KeywordStrategyInterface
{
    /**
     * @var Registry
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param array $values
     */
    public function Handle(array $values)
    {
        if ($this->Supported($values))
        {
            $subscriber = new Subscriber();
            $subscriber->setMsisdn($values['from']);
            $subscriber->setName(substr($values['text'],10));
            $subscriber->setStatus(1);
            $em = $this->em;
            $em->persist($subscriber);
            $em->flush();
        }
    }

    /**
     * @param array $values
     * @return int
     */
    static public function Supported(array $values)
    {
        $text = strtolower($values['text']);
        return preg_match("/^subscribe/i", $text, $matches);
    }
}