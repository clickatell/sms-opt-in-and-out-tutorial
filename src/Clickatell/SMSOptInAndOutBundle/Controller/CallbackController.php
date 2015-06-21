<?php

namespace Clickatell\SMSOptInAndOutBundle\Controller;

use Clickatell\Callback;
use Clickatell\SMSOptInAndOutBundle\Entity\Mo\Log as MoLog;
use Clickatell\SMSOptInAndOutBundle\Keyword\KeywordManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CallbackController extends Controller
{
    /**
     * @param $values
     */
    public function moReceived($values)
    {
        $this->_LogMoEntry($values);
        $km = $this->getKeywordManager();
        $km->HandleMoCallback($values);
    }

    /**
     * @return Response
     * @throws \Exception
     */
    public function moReceivedAction()
    {
        Callback::parseMoCallback(array($this,"moReceived"));
        return new Response("Nothing Received!");
    }

    /**
     * @return KeywordManager
     */
    public function getKeywordManager()
    {
        return $this->container->get('keyword_manager');
    }

    /**
     * @param $values
     */
    protected function _LogMoEntry($values)
    {
        $logEntry = new MoLog();
        $logEntry->setApiId($values['api_id']);
        $logEntry->setMsgId($values['moMsgId']);
        $logEntry->setSender($values['from']);
        $logEntry->setReceiver($values['to']);
        $logEntry->setTimestamp($values['timestamp']);
        $logEntry->setNetwork($values['network']);
        $logEntry->setContent($values['text']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($logEntry);
        $em->flush();
    }
}