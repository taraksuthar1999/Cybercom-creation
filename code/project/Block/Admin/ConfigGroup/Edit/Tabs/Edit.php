<?php
namespace Block\Admin\ConfigGroup\Edit\Tabs;


class Edit extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();

        $this->setTemplate('view/admin/configGroup/edit/tabs/edit.php');
    }
}