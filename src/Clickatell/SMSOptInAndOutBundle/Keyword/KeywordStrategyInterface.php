<?php

namespace Clickatell\SMSOptInAndOutBundle\Keyword;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManager;

interface KeywordStrategyInterface
{
    public function __construct(EntityManager $em);
    static public function Supported(array $values);
    public function Handle(array $values);
}