<?php
namespace Block\Admin\CustomerGroup;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    protected $customerGroups = [];
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/customerGroup/grid.php');
    }
    public function setCustomerGroups($customerGroups = null)
    {
        if (!$customerGroups) {
            $customerGroup = \Mage::getModel('Model\CustomerGroup');

            $customerGroups = $customerGroup->fetchAll();

        }
        $this->customerGroups = $customerGroups;
        return $this;
    }
    public function getCustomerGroups()
    {
        if (!$this->customerGroups) {
            $this->setcustomerGroups();
        }
        return $this->customerGroups;
    }
}
?>