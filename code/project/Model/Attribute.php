<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');
class Attribute extends \Model\Core\Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('attribute');
        $this->setPrimaryKey('attributeId');
    }
    public function getInputTypeOptions()
    {
        return [
            'text' => 'TextBox',
            'textarea' => 'Textarea',
            'select' => 'Select',
            'select-multiple' => 'Select Multiple',
            'checkbox' => 'Checkbox',
            'radio' => 'Radio'
        ];
    }
    public function getBackendTypeOptions()
    {
        return [
            'varchar(255)' => 'Varchar',
            'int(11)' => 'Int',
            'decimal(10,2)' => 'Decimal',
            'text' => 'Text'
        ];
    }
    public function getEntityTypeOptions()
    {
        return [
            'product' => 'Product',
            'category' => 'Category'
        ];
    }

}
?>