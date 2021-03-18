<?php
Mage::loadFileByClassName('Controller_Core_Admin');
class Controller_Dashboard extends Controller_Core_Admin
{
    public function indexAction()
    {
        $layout = Mage::getBlock('Block_Core_Layout');
        echo $layout->toHtml();
    }
}
?>