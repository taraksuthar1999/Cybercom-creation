<?php
namespace Controller\Admin;

class Order extends \Controller\Core\Admin
{
    public function saveAction()
    {
        try {
            $order = \Mage::getModel('Model\Order');

            $cartId = $this->getRequest()->getGet('id');
            $cart = \Mage::getModel('Model\Cart');
            $cart->load($cartId);
            $customer = $cart->getCustomer();
            $payment = $cart->getPayment();
            $shipping = $cart->getShipping();
            $order->customerName = $customer->firstName . ' ' . $customer->lastName;
            $order->paymentName = $payment->name;
            $order->paymentCode = $payment->code;
            $order->paymentAmount = $payment->amount;
            $order->shippingName = $shipping->name;
            $order->shippingCode = $shipping->code;
            $order->shippingAmount = $shipping->amount;
            $order->discount = $cart->discount;
            $order->total = $cart->Total;
            if (!$order->save()) {
                throw new \Exception('error placing order');
            }
            $orderId = $order->orderId;
            $billingAddress = $cart->getBillingAddress();
            $shippingAddress = $cart->getShippingAddress();
            if (!$shippingAddress || !$billingAddress) {
                throw new \Exception('sorry address not found');
            }
            $orderAddress = \Mage::getModel('Model\Order\Address');
            $orderAddress->orderId = $orderId;
            $orderAddress->addressType = $billingAddress->addressType;
            $orderAddress->address = $billingAddress->address;
            $orderAddress->city = $billingAddress->city;
            $orderAddress->state = $billingAddress->state;
            $orderAddress->country = $billingAddress->country;
            $orderAddress->zip = $billingAddress->zip;


            if (!$orderAddress->save()) {
                throw new \Exception('error saving address');
            }
            $orderAddress = \Mage::getModel('Model\Order\Address');
            $orderAddress->orderId = $orderId;
            $orderAddress->addressType = $shippingAddress->addressType;
            $orderAddress->address = $shippingAddress->address;
            $orderAddress->city = $shippingAddress->city;
            $orderAddress->state = $shippingAddress->state;
            $orderAddress->country = $shippingAddress->country;
            $orderAddress->zip = $shippingAddress->zip;
            if (!$orderAddress->save()) {
                throw new \Exception('error saving address');
            }
            $items = $cart->getItems();
            foreach ($items->getData() as $key => $value) {
                $orderItem = \Mage::getModel('Model\Order\Item');
                $orderItem->orderId = $orderId;
                $product = \Mage::getModel('Model\Product');
                $product->load($value->productId);
                $orderItem->productName = $product->name;
                $orderItem->quantity = $value->quantity;
                $orderItem->basePrice = $value->basePrice;
                $orderItem->price = $value->price;
                if (!$orderItem->save()) {
                    throw new \Exception('error saving items');
                }


            }
            $session = \Mage::getModel('Model\Admin\Session');
            unset($session->customerId);


            if (!$cart->delete()) {
                $order->delete($orderId);

            }



        } catch (\Exception $e) {
            $this->getMessage()->setfailure($e->getMessage());
        }

    }
}
?>