<?php
namespace Block\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class GroupPrice extends \Block\Core\Template
{
    protected $customerGroups = [];
    protected $product = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/product/edit/tabs/groupPrice.php');

    }
    public function setProduct($product)
    {
        $this->product = $product;
    }
    public function getProduct()
    {
        if (!$this->product) {
            return null;
        }
        return $this->product;
    }
    public function setCustomerGroups($customerGroups = null)
    {
        if (!$customerGroups) {

            $GroupPrice = \Mage::getModel('Model\Product\GroupPrice');

            $query = "SELECT cg.`id` as groupId,cg.`name` as groupName,if(p.`price` IS NULL,'{$this->getProduct()->price}',p.`price`) as price,cgp.`entityId`,cgp.`price` as groupPrice FROM `customergroup` AS cg LEFT JOIN `product_customer_group_price` AS cgp ON cg.`id`=cgp.`customerGroupId` AND cgp.`productId`='{$this->getProduct()->id}' LEFT JOIN `product` as p ON cgp.`productId`= p.`id`";

            $customerGroups = $GroupPrice->fetchAll($query);


        }
        $this->customerGroups = $customerGroups;
    }
    public function getCustomerGroups()
    {
        if (!$this->customerGroups) {
            $this->setCustomerGroups();
        }
        return $this->customerGroups;
    }


}
?>