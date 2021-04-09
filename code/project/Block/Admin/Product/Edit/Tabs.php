<?php
namespace Block\Admin\Product\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    // protected $tabs = [];
    // protected $defaultTab = null;
    public function __construct()
    {
        parent::__construct();
       // $this->setTemplate('view/admin/product/edit/tabs.php');
        $this->prepareTab();
    }
    public function prepareTab()
    {
        $this->addTab('product', ['label' => 'Product Information', 'block' => 'Block\Admin\Product\Edit\Tabs\Edit']);
        $this->addTab('media', ['label' => 'Product Media', 'block' => 'Block\Admin\Product\Edit\Tabs\Media']);
        $this->addTab('groupPrice', ['label' => 'Group Price', 'block' => 'Block\Admin\Product\Edit\Tabs\GroupPrice']);

        $this->setDefaultTab('product');
        return $this;
    }
    // public function setDefaultTab($defaultTab)
    // {
    //     $this->defaultTab = $defaultTab;
    //     return $this;
    // }
    // public function getDefaultTab()
    // {
    //     return $this->defaultTab;
    // }
    // public function setTabs(array $tabs)
    // {
    //     $this->tabs = $tabs;
    //     return $this;
    // }
    // public function getTabs()
    // {
    //     return $this->tabs;
    // }
    // public function addTab($key, $tab = [])
    // {
    //     $this->tabs[$key] = $tab;
    //     return $this;
    // }
    // public function getTab($key)
    // {
    //     if (!array_key_exists($key, $this->tabs)) {
    //         return null;
    //     }
    //     return $this->tabs[$key];
    // }

    // public function removeTab($key)
    // {
    //     if (!array_key_exists($key, $this->tabs)) {
    //         return null;
    //     }
    //     unset($this->tabs[$key]);
    // }
}
?>