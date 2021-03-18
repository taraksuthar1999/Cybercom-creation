<?php 
namespace Controller\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');
class GroupPrice extends \Controller\Core\Admin
{

    public function updateAction()
    {
        echo '<pre>';
        $productId = $this->getRequest()->getGet('id');
        $groupPrices = $this->getRequest()->getPost('groupPrice');
        if (array_key_exists('Exists', $groupPrices)) {
            foreach ($groupPrices['Exists'] as $groupId => $groupPrice) {
                $query = "SELECT * FROM `product_customer_group_price` WHERE `productId` ='{$productId}' AND `customerGroupId` = '{$groupId}'";
                $productCustomerGroupPrice = \Mage::getModel('Model\Product\GroupPrice');
                $productCustomerGroupPrice->fetchRow($query);
                $productCustomerGroupPrice->price = $groupPrice;
                $productCustomerGroupPrice->save();

            }
        }
        if (array_key_exists('New', $groupPrices)) {
            foreach ($groupPrices['New'] as $groupId => $groupPrice) {
                $productCustomerGroupPrice = Mage::getModel('Model_Product_GroupPrice');
                $productCustomerGroupPrice->productId = $productId;
                $productCustomerGroupPrice->customerGroupId = $groupId;
                $productCustomerGroupPrice->price = $groupPrice;
                $productCustomerGroupPrice->save();

            }
        }
        $this->redirect('edit', 'product');


    }
}
?>