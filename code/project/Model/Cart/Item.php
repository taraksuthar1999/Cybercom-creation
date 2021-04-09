<?php
namespace Model\Cart;

\Mage::getModel('Model\Core\Table');
class Item extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('cartitem');
        $this->setPrimaryKey('cartItemId');
    }
}
?>