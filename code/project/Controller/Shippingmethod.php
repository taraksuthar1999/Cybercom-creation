<?php
namespace Controller;

\Mage::loadFileByClassName('Controller\Core\Admin');


class Shippingmethod extends \Controller\Core\Admin
{
    protected $Shippingmethods = [];
    protected $Shippingmethod = null;
    public function setShippingmethod($Shippingmethod = null)
    {
        if (!$Shippingmethod) {
            $Shippingmethod = \Mage::getModel('Model\Shippingmethod');

        }
        $this->Shippingmethod = $Shippingmethod;
        return $this;
    }
    public function getShippingmethod()
    {
        if (!$this->Shippingmethod) {
            $this->setShippingmethod();
        }
        return $this->Shippingmethod;
    }
    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction()
    {
        try {


            $layout = \Mage::getBlock('Block\Core\Layout');
            $layout->getChild('Content')->addChild('grid', \Mage::getBlock('Block\Shippingmethod\Grid'));
            echo $layout->toHtml();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }


    }
    public function getShippingmethods()
    {
        return $this->Shippingmethods;
    }
    public function setShippingmethods($Shippingmethods)
    {
        $this->Shippingmethods = $Shippingmethods;
        return $this;
    }


    public function saveAction()
    {

        try {
            $Shippingmethod = $this->getShippingmethod();
            if ($id = (int)$this->getRequest()->getGet("id")) {
                $Shippingmethod = $Shippingmethod->load($id);

                if (!$Shippingmethod) {

                    throw new Exception("Record not Found");
                }
                $Shippingmethod->updatedDate = date("Y-m-d H:i:s");
            } else {
                $Shippingmethod->createdDate = date("Y-m-d H:i:s");
            }



            $ShippingmethodData = $this->getRequest()->getPost('Shippingmethod');

            $Shippingmethod->setData($ShippingmethodData);

            $Shippingmethod->save();

            $this->redirect('grid', null, null, true);


        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }



    }
    public function editAction()
    {

        try {

            $layout = \Mage::getBlock('Block\Core\layout');
            $layout->getChild('Content')->addChild('edit', \Mage::getBlock('Block\Shippingmethod\Form'));

            echo $layout->toHtml();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

    }

    public function deleteAction()
    {
        $ShippingmethodId = (int)$this->getRequest()->getGet('id');
        if (!$ShippingmethodId) {
            throw new Exception("Error processing request");
        }
        $Shippingmethod = $this->getShippingmethod();
        $Shippingmethod->load($ShippingmethodId);
        $Shippingmethod->delete($ShippingmethodId);
        $this->redirect('grid', 'Shippingmethod', null, true);

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