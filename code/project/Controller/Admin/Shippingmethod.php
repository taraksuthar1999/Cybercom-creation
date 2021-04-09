<?php
namespace Controller\Admin;

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

    public function gridAction($status = 'success', $msg = null, $messageHtml = null)
    {
        try {
            $grid = \Mage::getBlock('Block\Admin\Shippingmethod\Grid')->toHtml();
            $element = [
                [
                    'selector' => '#htmlGrid',
                    'html' => $grid
                ],
                [
                    'selector' => '#messageHtml',
                    'html' => $messageHtml
                ]
            ];
            $this->responseJson($status, $msg, $element);

            // $layout = \Mage::getBlock('Block\Core\Layout');
            // $layout->getChild('Content')->addChild('grid', \Mage::getBlock('Block\Admin\Shippingmethod\Grid'));
            // echo $layout->toHtml();
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
                $this->getMessage()->setSuccess('Record Edited Successfully.');
            } else {
                $Shippingmethod->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess('Record Created Successfully.');
            }



            $ShippingmethodData = $this->getRequest()->getPost('Shippingmethod');

            $Shippingmethod->setData($ShippingmethodData);

            if (!$Shippingmethod->save()) {
                throw new \Exception('error saving');
            }

            //$this->redirect('grid', null, null, true);
            $messageHtml = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction('success', null, $messageHtml);



    }
    public function editAction()
    {

        try {

            $layout = \Mage::getBlock('Block\Core\layout');
            $layout->getChild('Content')->addChild('edit', \Mage::getBlock('Block\Admin\Shippingmethod\Form'));

            echo $layout->toHtml();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

    }

    public function deleteAction()
    {
        try {

            $ShippingmethodId = (int)$this->getRequest()->getGet('id');
            if (!$ShippingmethodId) {
                throw new Exception("Error processing request");
            }
            $Shippingmethod = $this->getShippingmethod();

            if (!$Shippingmethod->load($ShippingmethodId)) {
                $this->getMessage()->setFailure('Invaid request Id');
            }

            if (!$Shippingmethod->delete($ShippingmethodId)) {
                $this->getMessage()->setFailure('Error Deleting');
            }
           // $this->redirect('grid', 'Shippingmethod', null, true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $messageHtml = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();

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