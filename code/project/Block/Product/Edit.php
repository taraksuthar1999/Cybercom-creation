<?php
namespace Block\Product;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $product = null;
    public function __construct()
    {
        parent::__construct();

        $this->setTemplate('view/product/edit.php');
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

        $tabsBlock = \Mage::getBlock('Block\Product\Edit\Tabs');
        $tabs = $tabsBlock->getTabs();

        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];

        $block = \Mage::getBlock($blockClassName);

        $block->setProduct($this->product);

        echo $block->toHtml();

    }

    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Product');
    }

}

?>