<?php
namespace Model\ConfigGroup;

class Configuration extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setPrimaryKey('configId');
        $this->setTableName('config');
    }
}
?>