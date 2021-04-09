<?php
namespace Controller\Admin;

//\Mage::loadFileByClassName('Controller\Core\Admin');





class Product extends \Controller\Core\Admin
{
    protected $products = [];
    protected $product = null;
    public function setProduct($product = null)
    {
        if (!$product) {
            $product = \Mage::getModel('Model\Product');

        }
        $this->product = $product;
        return $this;
    }
    public function getProduct()
    {
        if (!$this->product) {
            $this->setProduct();
        }
        return $this->product;
    }
    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction($status = 'success', $msg = null, $messageHtml = null)
    {



        $productGrid = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();

        $element = [
            [
                'selector' => '#htmlGrid',
                'html' => $productGrid
            ],
            [
                'selector' => '#messageHtml',
                'html' => $messageHtml
            ],
        ];
        $this->responseJson($status, $msg, $element);






    }



    public function getProducts()
    {
        return $this->products;
    }
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }



    public function saveAction()
    {

        try {
            $product = $this->getProduct();
            if ($id = (int)$this->getRequest()->getGet("id")) {
                if (!$id) {
                    throw new \Exception("Request Id Null.");
                }
                $product = $product->load($id);
                if (!$product) {

                    throw new \Exception("Record not Found.");
                }
                $product->updatedDate = date("Y-m-d H:i:s");
                if (!$productData = $this->getRequest()->getPost('product')) {
                    throw new \Exception("Empty Data Received.");
                }
                $product->setData($productData);
                if (!$product->save()) {
                    throw new \Exception("Error Saving Data.");
                }
                $this->getMessage()->setSuccess('Product Edited Successfully.');
            } else {
                $product->createdDate = date("Y-m-d H:i:s");
                if (!$productData = $this->getRequest()->getPost('product')) {
                    throw new \Exception("Empty Data Received.");
                }
                $product->setData($productData);
                if (!$product->save()) {
                    throw new \Exception("Error Saving Data.");
                }
                $this->getMessage()->setSuccess('Product Created Successfully.');
            }



           
           // $this->redirect('grid', null, null, true);


        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
           // $this->redirect('grid', null, null, true);

        }
        $messageHtml = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();
        $this->gridAction('success', null, $messageHtml);


    }
    public function editAction()
    {

        try {
            $product = \Mage::getModel('Model\Product');
            $product->load($this->getRequest()->getGet('id'));

            $edit = \Mage::getBlock('Block\Admin\Product\Edit');
            $edit->setTableRow($product);
            //$edit->setProduct($product);
            $element = [
                [
                    'selector' => '#htmlGrid',
                    'html' => $edit->toHtml()
                ],
                [
                    'selector' => '#messageHtml',
                    'html' => null
                ],



            ];



            $this->responseJson('success', null, $element);


        } catch (\Exception $e) {
            echo $e->getMessage();

        }

    }


    public function deleteAction()
    {
        try {
            $productId = (int)$this->getRequest()->getGet('id');
            if (!$productId) {
                throw new \Exception("Request Id NUll.");
            }
            $product = $this->getProduct();
            if (!$product->load($productId)) {
                throw new \Exception("Invalid Request Id.");
            }
            if (!$product->delete($productId)) {
                throw new \Exception("Error Deleting the Record.");
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // $this->redirect('grid', 'Product', null, true);
        }
        // $this->redirect('grid', 'Product', null, true);
        $messageHtml = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();
        $this->gridAction('success', null, $messageHtml);
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