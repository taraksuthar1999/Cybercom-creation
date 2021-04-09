<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Media extends \Block\Core\Template
{
    protected $media = null;
    // protected $product = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/product/edit/tabs/media.php');
    }
    // public function setProduct($product)
    // {
    //     $this->product = $product;
    // }
    // public function getProduct()
    // {
    //     if (!$this->product) {
    //         return null;
    //     }
    //     return $this->product;
    // }
    public function setMedia($media = null)
    {
        if (!$media) {
            $image = \Mage::getModel('Model\Product\Media');
            $productId = $this->getTableRow()->id;
            $query = "SELECT * FROM `{$image->getTableName()}` WHERE `productId` = '{$productId}'";
            $media = $image->fetchAll($query);
        }
        $this->media = $media;
    }
    public function getMedia()
    {
        if (!$this->media) {
            $this->setMedia();
        }
        return $this->media;
    }

}
?>