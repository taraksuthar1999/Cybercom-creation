<?php 
namespace Block\Core;

\Mage::loadFileByClassName('Block\Core\Template');


class Layout extends \Block\Core\Template
{


    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/layout/oneColumnStructure.php');

        $this->prepareChildren('Content', \Mage::getBlock('Block\Layout\Content'));
        $this->prepareChildren('Header', \Mage::getBlock('Block\Layout\Header'));
        $this->prepareChildren('Message', \Mage::getBlock('Block\Layout\Message'));
        $this->prepareChildren('Left', \Mage::getBlock('Block\Layout\Left'));

        $this->prepareChildren('Footer', \Mage::getBlock('Block\Layout\Footer'));

    }
    public function getHeader()
    {
        return $this->getChild('Header');
    }
    public function getContent()
    {
        return $this->getChild('Content');
    }
    public function getFooter()
    {
        return $this->getChild('Footer');
    }


}

?>