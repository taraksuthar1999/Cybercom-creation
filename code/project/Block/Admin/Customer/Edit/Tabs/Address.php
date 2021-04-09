<?php
namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Address extends \Block\Core\Template
{
    public $billing = null;
    public $shipping = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/customer/edit/tabs/address.php');
    }
    public function setbilling($billing = null)
    {
        $id = $this->getRequest()->getGet('id');
        if (!$id) {
            return false;
        }
        if (!$billing) {
            $billing = \Mage::getModel('Model\Address');
            $query = "SELECT * FROM `customeraddress` WHERE `customerId`={$id} AND `addressType`='billing'";
            $billing->fetchRow($query);
        }
        $this->billing = $billing;
        return $this;
    }
    public function getbilling()
    {
        if (!$this->billing) {
            $this->setbilling();

        }
        return $this->billing;
    }
    public function setshipping($shipping = null)
    {
        $id = $this->getRequest()->getGet('id');
        if (!$id) {
            return false;
        }
        if (!$shipping) {
            $shipping = \Mage::getModel('Model\Address');
            $query = "SELECT * FROM `customeraddress` WHERE `customerId`={$id} AND `addressType`='shipping'";
            $shipping->fetchRow($query);
        }
        $this->shipping = $shipping;
        return $this;
    }
    public function getshipping()
    {
        if (!$this->shipping) {
            $this->setshipping();

        }
        return $this->shipping;
    }

}
?>