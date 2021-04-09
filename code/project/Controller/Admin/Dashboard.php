<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Dashboard extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = \Mage::getBlock('Block\Core\Layout');
        echo $layout->toHtml();
    }
}
?>