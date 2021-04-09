<?php
namespace Model\Order;

class Address extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setPrimaryKey('orderAddressId');
        $this->setTableName('orderaddress');
    }
}
?>