<?php
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Edit extends \Block\Core\Template
{
    protected $Category = null;
    protected $categoryOptions = [];
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/category/edit/tabs/edit.php');
    }
    public function setCategoryDropDown($CategoryId = null)
    {

        $Category = Mage::getModel('Model_Category');
        if ($CategoryId) {
            $query = "SELECT `id`,`name` FROM `category` WHERE `id` != {$this->getTableRow()->id}";
        } else {
            $query = "SELECT `id`,`name` FROM `category`";
        }
        $CategoryDropDown = $Category->fetchAll($query);


        $this->CategoryDropDown = $CategoryDropDown;
        return $this;
    }
    public function getCategoryDropDown($CategoryId = null)
    {
        if (!$this->CategoryDropDown) {
            $this->setCategoryDropDown();
        }
        return $this->CategoryDropDown;
    }

    public function getCategoryOptions()
    {

        if (!$this->categoryOptions) {
            $query = "SELECT `{$this->getCategory()->getPrimaryKey()}`, `name` FROM `{$this->getCategory()->getTableName()}`; ";

            $options = $this->getCategory()->getAdapter()->fetchPairs($query);




            $query = "SELECT `{$this->getCategory()->getPrimaryKey()}`, `pathId` FROM `{$this->getCategory()->getTableName()}`; ";
            $this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);


            if ($this->categoryOptions) {
                foreach ($this->categoryOptions as $categoryId => &$pathId) {
                    $pathIds = explode("=", $pathId);
                    foreach ($pathIds as $key => &$id) {
                        if (array_key_exists($id, $options)) {
                            $id = $options[$id];
                        }
                    }
                    $pathId = implode("/", $pathIds);
                }
            }
            $this->categoryOptions = ["" => "Select"] + $this->categoryOptions;
        }
        return $this->categoryOptions;
    }



    public function setCategory($Category = null)
    {
        if (!$Category) {
            $Category = \Mage::getModel('Model\Category');
            if ($categoryId = $this->getTableRow()->id) {
                $Category->load($categoryId);
            }

        }
        $this->Category = $Category;
        return $this;
    }
    public function getCategory()
    {
        if (!$this->Category) {
            $this->setCategory();
        }
        return $this->Category;
    }
}

?>