<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');
class Address extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setPrimaryKey('addressId');
        $this->setTableName('customeraddress');
    }
}
?>