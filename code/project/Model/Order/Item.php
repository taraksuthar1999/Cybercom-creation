<?php
namespace Model\Order;

class Item extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setPrimaryKey('orderItemId');
        $this->setTableName('orderitem');
    }
}
?>