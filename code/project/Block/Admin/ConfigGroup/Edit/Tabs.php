<?php
namespace Block\Admin\ConfigGroup\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();
    }
    public function prepareTab()
    {
        $this->addTab('information', ['label' => 'Information', 'block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Edit']);
        $this->addTab('configuration', ['label' => 'Configuration', 'block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Configuration']);

        $this->setDefaultTab('information');
        return $this;
    }
}
?>