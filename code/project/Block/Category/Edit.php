<?php
namespace Block\Category;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $Category = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/category/edit.php');
    }
    public function getTabContent()
    {

        $tabsBlock = \Mage::getBlock('Block\Category\Edit\Tabs');
        $tabs = $tabsBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];

        $block = \Mage::getBlock($blockClassName);
        echo $block->toHtml();

    }

}

?>