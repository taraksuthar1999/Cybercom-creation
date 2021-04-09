<?php 
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');
class GroupPrice extends \Controller\Core\Admin
{

    public function gridAction($status = "success", $msg = null, $messageHtml = null)
    {
        $grid = \Mage::getBlock("Block\Admin\Product\Edit\Tabs\GroupPrice");
        $id = $this->getRequest()->getGet('id');
        $product = \Mage::getModel('Model\Product')->load($id);
        $grid->setTableRow($product)->toHtml();
        $element = [
            [
                'selector' => '#htmlGrid',
                'html' => $grid
            ],
            [
                'selector' => '#messageHtml',
                'html' => $messageHtml
            ],
        ];
        $this->responseJson($status, $msg, $messageHtml);
    }
    public function updateAction()
    {
        try {

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
                    $productCustomerGroupPrice = \Mage::getModel('Model\Product\GroupPrice');
                    $productCustomerGroupPrice->productId = $productId;
                    $productCustomerGroupPrice->customerGroupId = $groupId;
                    $productCustomerGroupPrice->price = $groupPrice;
                    $productCustomerGroupPrice->save();

                }
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }

        $this->gridAction();
        //$this->redirect('edit', 'product');


    }
}
?>