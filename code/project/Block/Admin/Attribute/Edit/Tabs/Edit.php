<?php
namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/attribute/edit/tabs/edit.php');
    }
}
?>