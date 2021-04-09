<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Cart extends \Controller\Core\Admin
{
    public function gridAction($status = "success", $msg = null)
    {
        $cart = $this->getCart();
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid');
        $grid->setCart($cart);

        $element = [
            [
                'selector' => '#htmlGrid',
                'html' => $grid->toHtml()
            ],
        ];
        echo $this->responseJson('success', null, $element);
    }







    public function addAction()
    {
        try {
            $productId = $this->getRequest()->getGet('id');
            $product = \Mage::getModel('Model\Product')->load($productId);
            if (!$cart = $this->getCart()) {
                throw new \Exception('Please Select Customer');
            }

            $cart->addToCartItem($product);


        } catch (\Exception $e) {
            $this->getSession()->setFailure($e->getMessage);
        }

        $grid = \Mage::getBlock('Block\Admin\Cart\Grid');
        $grid->setCart($cart);
        $element = [
            [
                'selector' => '#htmlGrid',
                'html' => $grid->toHtml()
            ],
        ];
        echo $this->responseJson('success', null, $element);

    }

    public function changeAction()
    {
        try {
            $customerId = (int)$this->getRequest()->getPost('customerId');
            $cart = $this->getCart($customerId);


            $this->gridAction('success', null);

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }


    }
    protected function getCart($customerId = null)
    {
        try {

            $cart = \Mage::getModel('Model\Cart');
            $session = \Mage::getModel('Model\Admin\Session');
            if ($customerId) {
                $session->customerId = $customerId;

            }
    
    
    // echo $session->customerId;

            if (!$customerId && !$session->customerId) {

                return $cart;
            }
    
    // $customerId = $session->customerId;


            $cart = $cart->load($session->customerId, 'customerId');

            if (!$cart) {
                $cart = \Mage::getModel('Model\Cart');

                $cart->customerId = $customerId;
                $cart->save();

            }


            return $cart;
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }



    }
    public function saveAction()
    {
        try {

            $data = $this->getRequest()->getPost('quantity');
            foreach ($data as $cartItemId => $value) {
                $item = \Mage::getModel('Model\Cart\Item')->load($cartItemId);

                if ($item->quantity != $value) {
                    $item->quantity = $value;

                    $item->basePrice = ($item->price - $item->discount) * $value;

                    if (!$item->save()) {
                        throw new \Exception('Error Saving.');
                    }

                }
            }


        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction('success', null);

    }
    public function updatePriceAction()
    {
        try {
            $price = $this->getRequest()->getPost('price');
            foreach ($price as $cartItemId => $price) {
                $item = \Mage::getModel('Model\Cart\Item')->load($cartItemId);
                $item->price = $price;

                if (!$item->save()) {
                    throw new \Exception('error Updating Price');
                }

            }

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction('success', null);
    }
    public function updateDiscountAction()
    {
        try {

            $discount = $this->getRequest()->getPost('discount');
            foreach ($discount as $cartId => $amount) {
                $cart = \Mage::getModel('Model\Cart')->load($cartId);
                $cart->discount = $amount;
                if (!$cart->save()) {
                    throw new \Exception('error updating Discount');
                }
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction('success', null);
    }
    public function saveCartAction()
    {
        try {

            $cartData = $this->getRequest()->getPost('cart');

            foreach ($cartData as $cartId => $value) {
                $cart = \Mage::getModel('Model\Cart')->load($cartId);
                foreach ($value as $method => $value) {
                    if ($method == 'billing') {
                        foreach ($value as $key => $data) {

                            if ($key == 'data') {
                                $address = \Mage::getModel('Model\Cart\Address');
                                $query = "SELECT * FROM {$address->getTableName()} WHERE `cartId`='{$cartId}' AND `addressType`='{$method}'";

                                if (!$address->fetchRow($query)) {
                                    $address = \Mage::getModel('Model\Cart\Address');
                                    $address->cartId = $cartId;
                                    $address->addressType = $method;
                                }
                                foreach ($data as $element => $value) {
                                    $address->$element = $value;
                                }
                                $address->save();


                            }
                            if ($key == 'billingSaveFlag' && $data == '1') {

                                $customer = $cart->getCustomer();
                                $address = \Mage::getModel('Model\Cart\Address');
                                $query = "SELECT * FROM {$address->getTableName()} WHERE `cartId`='{$cartId}' AND `addressType`='{$method}'";
                                $address->fetchRow($query);
                                if (!$billing = $customer->getBillingAddress()) {


                                    $billing = \Mage::getModel('Model\Address');
                                    $billing->customerId = $customer->id;
                                    $billing->addressType = $address->addressType;
                                    $billing->address = $address->address;
                                    $billing->city = $address->city;
                                    $billing->state = $address->state;
                                    $billing->country = $address->country;
                                    $billing->zipcode = $address->zip;

                                    $billing->save();

                                } else {

                                    $billing->address = $address->address;
                                    $billing->city = $address->city;
                                    $billing->state = $address->state;
                                    $billing->country = $address->country;
                                    $billing->zipcode = $address->zip;

                                    $billing->save();

                                }

                            }
                        }
                    }
                    if ($method == "shipping") {
                        foreach ($value as $key => $data) {

                            if ($key == 'data') {
                                $address = \Mage::getModel('Model\Cart\Address');
                                $query = "SELECT * FROM {$address->getTableName()} WHERE `cartId`='{$cartId}' AND `addressType`='{$method}'";

                                if (!$address->fetchRow($query)) {
                                    $address = \Mage::getModel('Model\Cart\Address');
                                    $address->cartId = $cartId;
                                    $address->addressType = $method;
                                }
                                foreach ($data as $element => $value) {
                                    $address->$element = $value;
                                }
                                $address->save();




                            }
                            if ($key == "shippingSameFlag" && $data == '1') {
                                $address = \Mage::getModel('Model\Cart\Address');
                                $query = "SELECT * FROM {$address->getTableName()} WHERE `cartId`='{$cartId}' AND `addressType`='billing'";
                                $address->fetchRow($query);
                                if (!$shipping = $cart->getShippingAddress()) {
                                    $shipping->customerId = $cart->customerId;
                                    $shipping->addressType = $method;
                                    $shipping->address = $address->address;
                                    $shipping->city = $address->city;
                                    $shipping->state = $address->state;
                                    $shipping->country = $address->country;
                                    $shipping->zip = $address->zip;


                                    $shipping->save();

                                } else {
                                    $shipping->address = $address->address;
                                    $shipping->city = $address->city;
                                    $shipping->state = $address->state;
                                    $shipping->country = $address->country;
                                    $shipping->zip = $address->zip;


                                    $shipping->save();

                                }
                            }
                            if ($key == "shippingSaveFlag" && $data == '1') {

                                $customer = $cart->getCustomer();
                                $address = \Mage::getModel('Model\Cart\Address');
                                $query = "SELECT * FROM {$address->getTableName()} WHERE `cartId`='{$cartId}' AND `addressType`='{$method}'";
                                $address->fetchRow($query);
                                if (!$shipping = $customer->getShippingAddress()) {


                                    $shipping = \Mage::getModel('Model\Address');
                                    $shipping->customerId = $customer->id;
                                    $shipping->addressType = $address->addressType;
                                    $shipping->address = $address->address;
                                    $shipping->city = $address->city;
                                    $shipping->state = $address->state;
                                    $shipping->country = $address->country;
                                    $shipping->zipcode = $address->zip;

                                    $shipping->save();

                                } else {
                                    $shipping->address = $address->address;
                                    $shipping->city = $address->city;
                                    $shipping->state = $address->state;
                                    $shipping->country = $address->country;
                                    $shipping->zipcode = $address->zip;

                                    $shipping->save();
                                }
                            }


                        }
                    }
                    if ($method == "paymentMethod" && $value) {


                        $cart->paymentMethodId = $value;
                    }
                    if ($method == "shippingMethod" && $value) {
                        $shipping = \Mage::getModel('Model\shippingmethod')->load($value);

                        $cart->shippingMethodId = $value;
                        $cart->shippingAmount = $shipping->amount;

                    }


                }
                $cart->save();
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction('success', null);
    }
    public function deleteAction()
    {

        try {

            $id = (int)$this->getRequest()->getGet('id');


            $item = \Mage::getModel('Model\Cart\Item');
            $item = $item->load($id);


            if (!$item) {
                throw new \Exception('invalid request Id');
            }
            if (!$item->delete()) {

                throw new \Exception('error deleting');
            }


        } catch (\Exception $e) {
            $e->getMessage();
        }
        $this->gridAction('success', null);
    }


}
?>