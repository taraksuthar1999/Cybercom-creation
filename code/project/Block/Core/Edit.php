<?php
namespace Block\Core;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $tab = null;
    protected $tabClass = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/core/edit.php');
    }
    public function setTabClass($tabClass)
    {
        $this->tabClass = $tabClass;
        $this;
    }
    public function getTabClass()
    {
        return $this->tabClass;
    }
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }
    public function getProduct()
    {
        if (!$this->product) {
            return null;
        }
        return $this->product;
    }
    public function getTabContent()
    {

        $tabsBlock = $this->getTabClass();

        $tabs = $tabsBlock->getTabs();

        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];

        $block = \Mage::getBlock($blockClassName);

        $block->setTableRow($this->getTableRow());

        echo $block->toHtml();

    }
    public function getTabHtml()
    {
        //$tabsBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
        echo $this->tabClass->toHtml();
    }


}

?>