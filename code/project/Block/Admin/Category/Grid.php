<?php
namespace Block\Admin\Category;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    protected $Categories = null;
    protected $categoryName = [];
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/category/grid.php');
    }



    public function setCategories($Categories = null)
    {
        if (!$Categories) {
            $Category = \Mage::getModel('Model\Category');
            $Categories = $Category->fetchAll();

        }
        $this->Categories = $Categories;
        return $this;
    }
    public function getCategories()
    {
        if (!$this->Categories) {
            $this->setCategories();
        }
        return $this->Categories;
    }
    public function getCategoryName($category)
    {
        $categoryObj = \Mage::getModel('Model\Category');
        if (!$this->categoryName) {
            $query = "SELECT `{$categoryObj->getPrimaryKey()}`, `name`
            FROM `{$categoryObj->getTableName()}`;";
            $this->categoryName = $categoryObj->getAdapter()->fetchPairs($query);

        }
        $pathIds = explode("=", $category->pathId);
        foreach ($pathIds as $key => &$id) {
            if (array_key_exists($id, $this->categoryName)) {
                $id = $this->categoryName[$id];
            }
        }
        $categoryPathName = implode("=>", $pathIds);
        return $categoryPathName;

    }

}
?>