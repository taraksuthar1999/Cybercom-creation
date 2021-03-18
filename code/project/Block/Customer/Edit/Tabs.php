<?php
namespace Block\Customer\Edit;

\Mage::loadFileByClassName('Block\Core\Template');

class Tabs extends \Block\Core\Template
{
    protected $tabs = [];
    protected $defaultTab = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/customer/edit/tabs.php');
        $this->prepareTab();
    }
    public function prepareTab()
    {
        $this->addTab('customer', ['label' => 'Customer Information', 'block' => 'Block\Customer\Edit\Tabs\Edit']);
        $this->addTab('address', ['label' => 'Customer Address', 'block' => 'Block\Customer\Edit\Tabs\Address']);

        $this->setDefaultTab('customer');
        return $this;
    }
    public function setDefaultTab($defaultTab)
    {
        $this->defaultTab = $defaultTab;
        return $this;
    }
    public function getDefaultTab()
    {
        return $this->defaultTab;
    }
    public function setTabs(array $tabs)
    {
        $this->tabs = $tabs;
        return $this;
    }
    public function getTabs()
    {
        return $this->tabs;
    }
    public function addTab($key, $tab = [])
    {
        $this->tabs[$key] = $tab;
        return $this;
    }
    public function getTab($key)
    {
        if (!array_key_exists($key, $this->tabs)) {
            return null;
        }
        return $this->tabs[$key];
    }

    public function removeTab($key)
    {
        if (!array_key_exists($key, $this->tabs)) {
            return null;
        }
        unset($this->tabs[$key]);
    }
}
?>