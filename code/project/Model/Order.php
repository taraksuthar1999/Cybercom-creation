<?php
namespace Model;

class Order extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('order');
        $this->setPrimaryKey('orderId');
    }
}
?>