<?php 

namespace CSSEditor;

use Omeka\Module\AbstractModule;
use Zend\EventManager\Event;
use Zend\EventManager\SharedEventManagerInterface;

class Module extends AbstractModule 
{

    public function addCSS(Event $event) {
        $view = $event->getTarget();
        $view->headLink()->appendStylesheet($view->assetUrl('css/csseditor.css', 'CSSEditor'));
    }

    public function attachListeners(SharedEventManagerInterface $sharedEventManager)
    {
        $sharedEventManager->attach('*', 'view.layout', [$this, 'addCSS']);
    }
} 

?>
