<?php
namespace Block\Admin\Shippingmethod;

\Mage::loadFileByClassName('Block\Core\Template');


class Grid extends \Block\Core\Template
{
    protected $Shippingmethods = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/shippingmethod/grid.php');
    }
    public function setShippingmethods($Shippingmethods = null)
    {
        if (!$Shippingmethods) {
            $Shippingmethod = \Mage::getModel('Model\Shippingmethod');
            $Shippingmethods = $Shippingmethod->fetchAll();

        }
        $this->Shippingmethods = $Shippingmethods;
        return $this;
    }
    public function getShippingmethods()
    {
        if (!$this->Shippingmethods) {
            $this->setShippingmethods();
        }
        return $this->Shippingmethods;
    }

}
?>