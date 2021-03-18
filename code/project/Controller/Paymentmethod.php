<?php
namespace Controller;

\Mage::loadFileByClassName('Controller\Core\Admin');


class Paymentmethod extends \Controller\Core\Admin
{
    protected $Paymentmethods = [];
    protected $Paymentmethod = null;
    public function setPaymentmethod($Paymentmethod = null)
    {
        if (!$Paymentmethod) {
            $Paymentmethod = \Mage::getModel('Model\Paymentmethod');


        }
        $this->Paymentmethod = $Paymentmethod;
        return $this;
    }
    public function getPaymentmethod()
    {
        if (!$this->Paymentmethod) {
            $this->setPaymentmethod();
        }
        return $this->Paymentmethod;
    }
    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction()
    {
        try {

            $layout = \Mage::getBlock('Block\Core\Layout');
            $layout->getChild('Content')->addChild('grid', \Mage::getBlock('Block\Paymentmethod\Grid'));
            echo $layout->toHtml();
        } catch (Exception $e) {

            $this->getMessage()->setFailure($e->getMessage());
            die();
        }


    }
    public function getPaymentmethods()
    {
        return $this->Paymentmethods;
    }
    public function setPaymentmethods($Paymentmethods)
    {
        $this->Paymentmethods = $Paymentmethods;
        return $this;
    }


    public function saveAction()
    {

        try {
            $Paymentmethod = $this->getPaymentmethod();
            if ($id = (int)$this->getRequest()->getGet("id")) {
                $Paymentmethod = $Paymentmethod->load($id);

                if (!$Paymentmethod) {

                    throw new Exception("Record not Found");
                }
                $Paymentmethod->updatedDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess('Record Edited Successfully');
            } else {
                $Paymentmethod->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess('Record Inserted Successfully');
            }



            $PaymentmethodData = $this->getRequest()->getPost('Paymentmethod');

            $Paymentmethod->setData($PaymentmethodData);

            $Paymentmethod->save();

            $this->redirect('grid', null, null, true);


        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, null, true);
        }



    }
    public function editAction()
    {

        try {


            $layout = \Mage::getBlock('Block\Core\Layout');
           // $layout->setTemplate('view/layout/twoColumnStructure.php');
            $layout->getChild('Content')->addChild('form', \Mage::getBlock('Block\Paymentmethod\Form'));
            echo $layout->toHtml();

        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

    }

    public function deleteAction()
    {
        $PaymentmethodId = (int)$this->getRequest()->getGet('id');
        if (!$PaymentmethodId) {
            throw new Exception("Error processing request");
        }
        $Paymentmethod = $this->getPaymentmethod();
        $Paymentmethod->load($PaymentmethodId);
        $Paymentmethod->delete($PaymentmethodId);
        $this->redirect('grid', 'Paymentmethod', null, true);

    }
    public function statusAction()
    {
        $productId = $_GET['id'];
        $status = ($_GET['status'] == 0) ? 1 : 0;
        $updatedDate = date('Y-m-d h:i:s');
        $query = "UPDATE `product` SET `status` = '{$status}', `updatedDate` = '{$updatedDate}' WHERE `id` = {$productId}";
        $this->redirect('grid', 'Product', null, true);
    }

}
?>