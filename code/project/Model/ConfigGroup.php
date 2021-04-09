<?php
namespace Model;

class ConfigGroup extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setPrimaryKey('groupId');
        $this->setTableName('config_group');
    }
    public function getConfigurations()
    {
        $configuration = \Mage::getModel('Model\ConfigGroup\Configuration');
        $query = "SELECT * FROM `{$configuration->getTableName()}` WHERE `groupId` = '{$this->groupId}'";

        $configuration = $configuration->fetchAll($query);
        return $configuration;
    }
}
?>