<?php
namespace Block\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Form extends \Block\Core\Template
{
    protected $product = null;
    public function __construct()
    {
        parent::__construct();

        $this->setTemplate('view/product/edit/tabs/form.php');
    }
    public function setProduct($product = null)
    {
        if (!$product) {
            $product = Mage::getBlock('Model_Product');
            if ($productId = $this->getRequest()->getGet('id')) {
                $product->load($productId);
            }

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
}

?>