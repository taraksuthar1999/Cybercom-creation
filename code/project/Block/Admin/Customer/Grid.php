<?php
namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    protected $Customers = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/customer/grid.php');
    }
    public function setCustomers($Customers = null)
    {
        if (!$Customers) {
            $Customer = \Mage::getModel('Model\Customer');
            $query = "SELECT  C.`id`, C.`firstName`, C.`lastName`, C.`email`, C.`password`, C.`status`, C.`createdDate`, C.`updatedDate`, CG.`name`,CA.`address`
            FROM `customer`AS C
            LEFT JOIN `customergroup` AS CG
            ON C.`groupid` = CG.`id`
            LEFT JOIN `customeraddress` AS CA
            ON C.`id` = CA.`customerId` AND CA.`addressType`='billing'";
            $Customers = $Customer->fetchAll($query);

        }
        $this->Customers = $Customers;
        return $this;
    }
    public function getCustomers()
    {
        if (!$this->Customers) {
            $this->setCustomers();
        }
        return $this->Customers;
    }

}
?>