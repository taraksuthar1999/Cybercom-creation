<?php
namespace Model\Cart;

\Mage::getModel('Model\Core\Table');
class Address extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('cartaddress');
        $this->setPrimaryKey('cartAddressId');
    }
}
?>