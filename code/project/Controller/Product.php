<?php
namespace Controller;

\Mage::loadFileByClassName('Controller\Core\Admin');





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
    public function testAction()
    {
        $productGrid = \Mage::getBlock('Block\Product\Grid')->toHtml();

        $response = [
            'status' => 'success',
            'message' => 'B+',
            'element' => [
                'selector' => '#htmlGrid',
                'html' => $productGrid
            ]
        ];
        header("Content-type:application/json; charset=UTF-8");
        echo json_encode($response);
    }
    public function testGridAction()
    {
        $layout = \Mage::getBlock('Block\Core\Layout');
        echo $layout->toHtml();

    }

    public function gridAction()
    {
        try {


            $test = \mage::getBlock('Block\Core\Layout');

            $test->getChild('Content')->addChild('grid', \mage::getBlock('Block\Product\Grid'));


            $grid = $test->toHtml();
            print_r($grid);
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }


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




            $this->redirect('grid', null, null, true);


        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, null, true);

        }



    }
    public function editAction()
    {

        try {
            $product = \Mage::getModel('Model\Product');
            $product->load($this->getRequest()->getGet('id'));

            $layout = \Mage::getBlock('Block\Core\Layout');
            $layout->setTemplate('view/layout/twoColumnStructure.php');
            $layout->getChild('Content')->addChild('edit', \Mage::getBlock('Block\Product\Edit'));
            $layout->getChild('Content')->getChild('edit')->setProduct($product);


            $layout->getChild('Left')->addChild('leftContent', \Mage::getBlock('Block\Product\Edit\Tabs'));


            print_r($layout->toHtml());

        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
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
            $this->redirect('grid', 'Product', null, true);
        }
        $this->redirect('grid', 'Product', null, true);

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