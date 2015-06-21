<?php
/**
 * Created by PhpStorm.
 * User: JZ
 * Date: 2015/06/21
 * Time: 5:31 PM
 * persistence
 */

namespace Clickatell\SMSOptInAndOutBundle\Keyword;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManager;

class KeywordManager
{
    protected $keywordStrategies = array();

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->keywordStrategies[] = new SubscribeKeyword($em);
    }

    /**
     * @param array $values
     * @return bool
     */
    public function HandleMoCallback(array $values)
    {
        /** @var KeywordStrategyInterface $class */
        foreach ($this->keywordStrategies as $class)
        {
            if ($class::Supported($values))
            {
                $class->Handle($values);
                return true;
            }
        }
        return false;
    }

}