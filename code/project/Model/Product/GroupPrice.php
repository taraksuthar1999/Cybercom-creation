<?php
namespace Model\Product;

\Mage::loadFileByClassName('Model\Core\Table');
class GroupPrice extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('product_customer_group_price');
        $this->setPrimaryKey('entityId');
    }
}
?>
