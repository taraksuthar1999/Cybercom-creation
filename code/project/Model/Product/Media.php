<?php
namespace Model\Product;

\Mage::getModel('Model\Core\Table');
class Media extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('product_media');
        $this->setPrimaryKey('imageId');
    }
    public function getImagePath()
    {
        return \Mage::getBaseDir("Image\Product\\");


    }

}
?>