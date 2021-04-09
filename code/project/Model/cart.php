<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');
class Cart extends \Model\Core\Table
{
    protected $shippingAddress = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('cart');
        $this->setPrimaryKey('cartId');
    }
    public function getItems()
    {
        $item = \Mage::getModel('Model\Cart\Item');
        $query = "SELECT *
        FROM `{$item->getTableName()}`
        WHERE `cartId` = '{$this->cartId}'";
        if (!$collection = $item->fetchAll($query)) {
            return false;
        }
        return $collection;
    }
    public function getCustomers()
    {
        $customer = \Mage::getModel('Model\Customer');
        $customer = $customer->fetchAll();
        return $customer;
    }
    public function getPaymentMethods()
    {
        $payment = \Mage::getModel('Model\Paymentmethod');
        $payment = $payment->fetchAll();
        return $payment;
    }
    public function getShippingMethods()
    {
        $shipping = \Mage::getModel('Model\shippingmethod');
        $shipping = $shipping->fetchAll();
        return $shipping;
    }
    public function getShippingMethod()
    {
        if (!$id = $this->shippingMethodId) {
            return false;
        }
        $shipping = \Mage::getModel('Model\shippingmethod')->load($id);
        return $shipping;
    }
    public function addToCartItem($product, $quantity = 1, $addMode = false)
    {
        $item = \Mage::getModel('Model\Cart\Item');
        $query = "SELECT * FROM `{$item->getTableName()}` WHERE `productId`={$product->id} AND `cartId`={$this->cartId}";
        $item = $item->fetchRow($query);

        if ($item) {

            $item->quantity += $quantity;
            //$item->basePrice = ($product->price - $product->discount) * $item->quantity;

            $item->save();

            return $this;
        }
        $item = \Mage::getModel('Model\Cart\Item');

        $item->cartId = $this->cartId;
        $item->productId = $product->id;
        $item->price = $product->price;
        $item->quantity = $quantity;
        $item->discount = $product->discount;
        $item->basePrice = $product->price;
        $item->createdDate = date('Y-m-d H:i:s');
        $item->save();
        return $this;

    }
    public function getCustomer()
    {
        if (!$this->customerId) {
            return false;
        }
        $customer = \Mage::getModel('Model\Customer');
        $customer->load($this->customerId);
        return $customer;
    }
    public function getPayment()
    {
        if (!$this->paymentMethodId) {
            return false;
        }
        $payment = \Mage::getModel('Model\Paymentmethod');
        $payment->load($this->paymentMethodId);
        return $payment;
    }
    public function getShipping()
    {
        if (!$this->shippingMethodId) {
            return false;
        }
        $shipping = \Mage::getModel('Model\Shippingmethod');
        $shipping->load($this->shippingMethodId);
        return $shipping;
    }

    public function getBillingAddress()
    {
        $address = \Mage::getModel('Model\Cart\Address');
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `cartId`='{$this->cartId}' AND `addressType`='billing'";
        $address = $address->fetchRow($query);
        if (!$address) {
            $address = $this->getCustomer()->getBillingAddress();
            if ($address) {
                $cartAddress = \Mage::getModel('Model\Cart\Address');
                $cartAddress->cartId = $this->cartId;
                $cartAddress->addressId = $address->addressId;
                $cartAddress->addressType = $address->addressType;
                $cartAddress->address = $address->address;
                $cartAddress->city = $address->city;
                $cartAddress->state = $address->state;
                $cartAddress->country = $address->country;
                $cartAddress->zip = $address->zipcode;
                // $cartAddress->setData($address->getData());

                $cartAddress->save();

                return $cartAddress;
            } else {
                $cartAddress = \Mage::getModel('Model\Cart\Address');
                return $cartAddress;
            }
        }
        return $address;
    }
    public function getShippingAddress()
    {
        $address = \Mage::getModel('Model\Cart\Address');
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `cartId`='{$this->cartId}' AND `addressType`='shipping'";
        $address = $address->fetchRow($query);

        if (!$address) {
            $address = $this->getCustomer()->getShippingAddress();
            if ($address) {
                $cartAddress = \Mage::getModel('Model\Cart\Address');
                $cartAddress->cartId = $this->cartId;
                $cartAddress->addressId = $address->addressId;
                $cartAddress->addressType = $address->addressType;
                $cartAddress->address = $address->address;
                $cartAddress->city = $address->city;
                $cartAddress->state = $address->state;
                $cartAddress->country = $address->country;
                $cartAddress->zip = $address->zipcode;
               
                // $cartAddress->setData($address->getData());
                $cartAddress->save();

                return $cartAddress;
            } else {
                $cartAddress = \Mage::getModel('Model\Cart\Address');
                return $cartAddress;
            }
        }
        return $address;
    }
    public function getTotal()
    {
        $item = \Mage::getModel('Model\Cart\Item');
        $this->Total = 0;
        $query = "SELECT * FROM `{$item->getTableName()}` WHERE `cartId`='{$this->cartId}'";
        if (!$items = $item->fetchAll($query)) {
            return 0;
        }
        foreach ($items->getData() as $key => $item) {
            $this->Total += ($item->quantity * $item->price);
        }
        if (!$shipping = \Mage::getModel('Model\shippingmethod')->load($this->shippingMethodId)) {
            return $this->Total;
        }
        $this->Total += $shipping->amount;


        $this->Total -= $this->discount;

        $this->save();
        return $this->Total;
    }


}
?>