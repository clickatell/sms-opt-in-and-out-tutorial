<?php
/**
 * Created by PhpStorm.
 * User: JZ
 * Date: 2015/06/21
 * Time: 9:34 PM
 */

namespace Clickatell\SMSOptInAndOutBundle\Keyword;

use Doctrine\ORM\EntityManager;

class UnSubscribeKeyword implements KeywordStrategyInterface
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param array $values
     * @return int
     */
    static public function Supported(array $values)
    {
        $text = strtolower($values['text']);
        return preg_match("/^(unsubscribe|stop)/i", $text, $matches);
    }

    /**
     * @param array $values
     */
    public function Handle(array $values)
    {
        if ($this->Supported($values))
        {
            $subscribers = $this->em->getRepository('ClickatellSMSOptInAndOutBundle:Subscriber')
                ->findBy(array('msisdn' => $values['from']));

            foreach($subscribers as $subscriber)
            {
                $this->em->remove($subscriber);
                $this->em->flush();
            }
        }
    }
}