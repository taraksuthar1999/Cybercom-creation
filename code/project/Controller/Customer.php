<?php
namespace Controller;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Customer extends \Controller\Core\Admin
{
    protected $Customers = [];
    protected $Customer = null;
    protected $Address = null;
    protected $customerId = null;
    public function getCustomerId()
    {
        return $this->customerId;
    }
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    public function setAddress($Address = null)
    {
        if (!$Address) {
            $Address = \Mage::getModel('Model_Address');

        }
        $this->Address = $Address;
        return $this;
    }
    public function getAddress()
    {
        if (!$this->Address) {
            $this->setAddress();
        }
        return $this->Address;
    }
    public function setCustomer($Customer = null)
    {
        if (!$Customer) {
            $Customer = \Mage::getModel('Model\Customer');

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
    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction()
    {
        try {


            $layout = \Mage::getBlock('Block\Core\Layout');
            $layout->getChild('Content')->addChild('grid', \Mage::getBlock('Block\Customer\Grid'));
            echo $layout->toHtml();
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }


    }
    public function getCustomers()
    {
        return $this->Customers;
    }
    public function setCustomers($Customers)
    {
        $this->Customers = $Customers;
        return $this;
    }


    public function saveAction()
    {


        try {

            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request");
            }
            $Customer = $this->getCustomer();
            $billing = \Mage::getModel('Model\Address');
            $shipping = \Mage::getModel('Model\Address');

            if ($id = (int)$this->getRequest()->getGet("id")) {

                if (!$id) {
                    throw new \Exception("Request id Null.");
                }
                if ($this->getRequest()->getGet('tab')) {
                    $query = "SELECT `addressId` FROM `customeraddress` WHERE `customerId` = {$id} AND `addressType`= 'billing'";
                    $billing->fetchRow($query);
                    $query = "SELECT `addressId` FROM `customeraddress` WHERE `customerId`={$id} AND `addressType`='shipping'";
                    $shipping->fetchRow($query);


                    $billing->addressType = 'billing';
                    $shipping->addressType = 'shipping';
                    if (!$billingAddress = $this->getRequest()->getPost('billing')) {
                        throw new \Exception("Empty Data Received.");
                    }


                    if (!$shippingAddress = $this->getRequest()->getPost('shipping')) {
                        throw new \Exception("Empty Data Received.");
                    }
                    $billing->customerId = $id;
                    $billing->setData($billingAddress);
                    $shipping->customerId = $id;
                    $shipping->setData($shippingAddress);
                    if (!$id = $billing->save()) {
                        throw new \Exception("Error Saving Data.");
                    }

                    if (!$id = $shipping->save()) {
                        throw new \Exception("Error Saving Data.");
                    }




                } else {
                    $Customer = $Customer->load($id);
                    if (!$Customer) {
                        throw new \Exception("Invalid Request Id.");
                    }
                    $Customer->updatedDate = date("Y-m-d H:i:s");
                    if (!$customerData = $this->getRequest()->getPost('customer')) {
                        throw new \Exception("Empty Data Received.");
                    }
                    $Customer->setData($customerData);

                    if (!$id = $Customer->save()) {
                        throw new \Exception("Error Saving Data.");
                    }

                }


                $this->getMessage()->setSuccess('Customer Edited Successfully.');


            } else {
                $Customer->createdDate = date("Y-m-d H:i:s");
                if (!$customerData = $this->getRequest()->getPost('customer')) {
                    throw new \Exception("Empty Data Received.");
                }
                $Customer->setData($customerData);

                if (!$id = $Customer->save()) {
                    throw new \Exception("Error Saving Data.");
                }

                $this->getMessage()->setSuccess('Customer Created Successfully.');

            }








            $this->redirect('grid', null, null, true);


        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, null, true);

        }



    }
    public function editAction()
    {

        try {


            $layout = \Mage::getBlock('Block\Core\Layout');
            $layout->setTemplate('view/layout/twoColumnStructure.php');
            $layout->getChild('Content')->addChild('form', \Mage::getBlock('Block\Customer\Edit'));
            $layout->getChild('Left')->addChild('leftContent', \Mage::getBlock('Block\Customer\Edit\Tabs'));

            echo $layout->toHtml();
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }

    }

    public function deleteAction()
    {
        try {
            $customerId = (int)$this->getRequest()->getGet('id');
            if (!$customerId) {
                throw new \Exception("Request Id Null.");
            }
            $Customer = $this->getCustomer();

            if (!$Customer->load($customerId)) {
                throw new \Exception("Invalid Request Id");

            }

            if (!$Customer->delete($customerId)) {
                throw new \Exception("Error Deleting the Record.");

            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', 'customer', null, true);
        }
        $this->redirect('grid', 'customer', null, true);

    }


}
?>