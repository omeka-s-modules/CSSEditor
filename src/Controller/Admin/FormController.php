<?php
namespace CSSEditor\Controller\Admin;

use Laminas\View\Model\ViewModel;
use Laminas\Mvc\Controller\AbstractActionController;

class FormController extends AbstractActionController
{
    public function indexAction()
    {
        $site = $this->currentSite();
        $this->getRequest()->getQuery()->set('site_id', $site->id());

        $view = new ViewModel;
        $view->setVariable('site', $site);
        return $view;
    }
}
