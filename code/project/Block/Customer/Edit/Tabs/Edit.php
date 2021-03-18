<?php
namespace Block\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');


class Edit extends \Block\Core\Template
{
    protected $Customer = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/customer/edit/tabs/edit.php');

    }
    public function setCustomer($Customer = null)
    {
        if (!$Customer) {
            $Customer = \Mage::getModel('Model\Customer');
            if ($customerId = $this->getRequest()->getGet('id')) {
                $Customer->load($customerId);
            }

        }
        $this->Customer = $Customer;
        return $this;
    }
    public function getCustomer()
    {
        if (!$this->Customer) {
            $this->setCustomer();
        }
        return $this->Customer;
    }
    public function getCustomerGroupOptions()
    {

    }
}

?>