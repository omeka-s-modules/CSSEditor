<?php 

namespace CssEditor;

use Omeka\Module\AbstractModule;
use Zend\EventManager\Event;
use Zend\EventManager\SharedEventManagerInterface;

class Module extends AbstractModule 
{
    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

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
