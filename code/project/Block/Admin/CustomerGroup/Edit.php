<?php 
namespace Block\Admin\CustomerGroup;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $customerGroup = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/customerGroup/edit.php');
    }

}
?>