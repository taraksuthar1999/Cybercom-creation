<?php
namespace Block\Admin\ConfigGroup;

class Grid extends \Block\Core\Template
{
    protected $configGroups;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/ConfigGroup/grid.php');
    }
    public function setConfigGroups($configGroups = null)
    {
        if (!$configGroups) {
            $configGroup = \Mage::getModel('Model\ConfigGroup');
            $configGroups = $configGroup->fetchAll();
        }
        $this->configGroups = $configGroups;
    }
    public function getConfigGroups()
    {
        if (!$this->configGroups) {
            $this->setConfigGroups();
        }
        return $this->configGroups;
    }
}
?>