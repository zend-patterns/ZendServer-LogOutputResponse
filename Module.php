<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/LogOutputResponse for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace LogOutputResponse;

use Zend\EventManager\EventManager;
use Zend\Mvc\MvcEvent;
use ZendServer\Log\Log;

class Module
{
    public function onBootstrap($e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager        = $e->getApplication()->getEventManager(); /* @var $eventManager EventManager */
        $eventManager->attach(MvcEvent::EVENT_FINISH, function(MvcEvent $e){
        	Log::debug(print_r($e->getResponse()->getContent(), true));
        });
    }
}
