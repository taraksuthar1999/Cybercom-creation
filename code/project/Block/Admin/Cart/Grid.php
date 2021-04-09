<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    protected $cart = null;
    protected $total = 0;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/cart/grid.php');
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
    public function addTotal($price, $quantity = 1)
    {
        $this->total += ($price * $quantity);
    }

    public function getTotal()
    {
        return $this->total;
    }
    public function getShippingAmount()
    {
        $shipping = $this->getCart()->getShippingMethod();
        return $shipping->amount;
    }

}
?>