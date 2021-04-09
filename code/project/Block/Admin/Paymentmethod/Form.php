<?php
namespace Block\Admin\Paymentmethod;

\Mage::loadFileByClassName('Block\Core\Template');

class Form extends \Block\Core\Template
{
    protected $Paymentmethod = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/paymentmethod/form.php');
    }
    public function setPaymentmethod($Paymentmethod = null)
    {
        if (!$Paymentmethod) {
            $Paymentmethod = \Mage::getModel('Model\Paymentmethod');
            if ($PaymentmethodId = $this->getRequest()->getGet('id')) {
                $Paymentmethod->load($PaymentmethodId);
            }

        }
        $this->Paymentmethod = $Paymentmethod;
        return $this;
    }
    public function getPaymentmethod()
    {
        if (!$this->Paymentmethod) {
            $this->setPaymentmethod();
        }
        return $this->Paymentmethod;
    }
}

?>