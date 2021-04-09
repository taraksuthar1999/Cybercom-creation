<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Edit extends \Block\Core\Template
{
    protected $product = null;
    public function __construct()
    {
        parent::__construct();

        $this->setTemplate('view/admin/product/edit/tabs/edit.php');
    }
    public function setProduct($product = null)
    {


        if (!$product) {
            $product = \Mage::getBlock('Model\Product');
            if ($productId = $this->getTableRow()->id) {
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