<?php
namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
    protected $product = null;
    public function __construct()
    {
        parent::__construct();

        $this->setTabClass(\Mage::getBlock('Block\Admin\Product\Edit\Tabs'));
    }

    // public function setProduct($product)
    // {
    //     $this->product = $product;
    //     return $this;
    // }
    // public function getProduct()
    // {
    //     if (!$this->product) {
    //         return null;
    //     }
    //     return $this->product;
    // }
    // public function getTabContent()
    // {

    //     $tabsBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
    //     $tabs = $tabsBlock->getTabs();

    //     $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
    //     if (!array_key_exists($tab, $tabs)) {
    //         return null;
    //     }
    //     $blockClassName = $tabs[$tab]['block'];

    //     $block = \Mage::getBlock($blockClassName);

    //     $block->setProduct($this->product);

    //     echo $block->toHtml();

    // }
    // public function getTabHtml()
    // {
    //     $tabsBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
    //     echo $tabsBlock->toHtml();
    // }

    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Product');
    }

}

?>