<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');


class Customer extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    const GROUP_RETAIL = 1;
    const GROUP_WHOLESALE = 2;
    public function __construct()
    {
        parent::__construct();
        $this->setPrimaryKey('id');
        $this->setTableName('customer');
    }

    public function getCustomerGroupOptions()
    {
        return [
            self::GROUP_RETAIL => 'Retail',
            self::GROUP_WHOLESALE => 'Wholesale'
        ];
    }

    public function getCustomerOptions()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable'
        ];
    }
}

?>