<?php
namespace Block\Admin\Shippingmethod;

\Mage::loadFileByClassName('Block\Core\Template');


class Form extends \Block\Core\Template
{
    protected $Shippingmethod = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/shippingmethod/form.php');
    }
    public function setShippingmethod($Shippingmethod = null)
    {
        if (!$Shippingmethod) {
            $Shippingmethod = \Mage::getModel('Model\Shippingmethod');

            if ($ShippingmethodId = $this->getRequest()->getGet('id')) {
                $Shippingmethod->load($ShippingmethodId);
            }

        }
        $this->Shippingmethod = $Shippingmethod;
        return $this;
    }
    public function getShippingmethod()
    {
        if (!$this->Shippingmethod) {
            $this->setShippingmethod();
        }
        return $this->Shippingmethod;
    }
}

?>