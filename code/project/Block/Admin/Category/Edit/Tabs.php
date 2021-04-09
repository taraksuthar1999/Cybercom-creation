<?php
namespace Block\Admin\Category\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    public function __construct()
    {
        parent::__construct();

        $this->prepareTab();
    }
    public function prepareTab()
    {
        $this->addTab('customer', ['label' => 'Category Information', 'block' => 'Block\Admin\Category\Edit\Tabs\Edit']);


        $this->setDefaultTab('customer');
        return $this;
    }

}
?>