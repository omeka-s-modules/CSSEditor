<?php

namespace CSSEditor;

use Omeka\Module\AbstractModule;
use Omeka\Permissions\Assertion\HasSitePermissionAssertion;
use Laminas\EventManager\Event;
use Laminas\Mvc\MvcEvent;
use Laminas\EventManager\SharedEventManagerInterface;

class Module extends AbstractModule
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $event)
    {
        parent::onBootstrap($event);
        $acl = $this->getServiceLocator()->get('Omeka\Acl');
        $acl->allow(
            null,
            'CSSEditor\Controller\Site\Index'
        );
        $acl->allow(
            null,
            'CSSEditor\Controller\Admin\Index'
        );
        $acl->allow(
            null,
            'Omeka\Entity\Site',
            'css-editor-modify',
            new HasSitePermissionAssertion('admin')
        );
    }

    public function addCSS(Event $event)
    {
        $services = $this->getServiceLocator();
        if (!$services->get('Omeka\Status')->isSiteRequest()) {
            return;
        }
        $view = $event->getTarget();
        $view->headLink()->appendStylesheet($view->url('site/css-editor', [
            'site-slug' => $view->site->slug(),
        ]));
        $siteSettings = $services->get('Omeka\Settings\Site');
        $externalCss = $siteSettings->get('css_editor_external_css');
        if ($externalCss) {
            foreach ($externalCss as $uri) {
                $view->headLink()->appendStylesheet($uri);
            }
        }
    }

    public function attachListeners(SharedEventManagerInterface $sharedEventManager)
    {
        $sharedEventManager->attach('*', 'view.layout', [$this, 'addCSS']);
    }
}
