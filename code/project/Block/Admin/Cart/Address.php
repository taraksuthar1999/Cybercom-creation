<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName('Block\Core\Template');
class Address extends \Block\Core\Template
{
    protected $cart = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/cart/address.php');
    }
    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }
    public function getCart()
    {
        if (!$this->cart) {
            return false;
        }
        return $this->cart;
    }


}
?>