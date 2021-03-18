<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\table');

class Category extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    protected $categoryPathId = null;
    public function __construct()
    {
        parent::__construct();
        $this->setPrimaryKey('id');
        $this->setTableName('category');
    }


    public function updatePathId()
    {

        if (!$this->parentId) {
            $categoryPathId = $this->id;

        } else {

            $parent = \Mage::getBlock('Model\Category');
            $parent->load($this->parentId);


            if (!$parent) {
                throw new Exception("Unable to load parent Id");
            }
            $categoryPathId = $parent->pathId . "=" . $this->id;

        }

        $this->pathId = $categoryPathId;
        $this->save();
        return $this;
    }
    public function updateChildrenPathIds($categoryPathId, $parentId = null)
    {
        $categoryPathId = $categoryPathId . "=";
        $query = "SELECT * FROM `category` WHERE pathId LIKE '{$categoryPathId}%' ORDER BY pathId ASC;";
        $categories = $this->fetchAll($query);
        if (!$categories) {
            return false;
        }
        foreach ($categories->getData() as $key => $row) {
            if ($parentId) {
                $row->parentId = $parentId;
            }
            $row->updatePathId();
        }
    }

    public function getCategoryOptions()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable'
        ];
    }
}

?>