<?php
namespace Block\Admin\Customer;

\Mage::getBlock('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
    protected $Customer = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Customer\Edit\Tabs'));

    }


}

?>