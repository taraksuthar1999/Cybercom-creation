<?php
namespace Block\Admin\Paymentmethod;

\Mage::loadFileByClassName('Block/Core/Template');


class Grid extends \Block\Core\Template
{
    protected $Paymentmethods = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/paymentmethod/grid.php');
    }

    public function setPaymentmethods($Paymentmethods = null)
    {
        if (!$Paymentmethods) {
            $Paymentmethod = \Mage::getModel('Model\Paymentmethod');

            $Paymentmethods = $Paymentmethod->fetchAll();

        }
        $this->Paymentmethods = $Paymentmethods;
        return $this;
    }
    public function getPaymentmethods()
    {
        if (!$this->Paymentmethods) {
            $this->setPaymentmethods();
        }
        return $this->Paymentmethods;
    }

}
?>