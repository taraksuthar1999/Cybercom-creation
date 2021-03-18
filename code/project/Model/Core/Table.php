<?php
namespace Model\Core;

class Table
{
    protected $data = [];
    protected $adapter = null;
    protected $primaryKey = null;
    protected $tableName = null;
    public function __construct()
    {

    }

    public function setAdapter()
    {
        $this->adapter = \Mage::getModel('Model\Core\Adapter');
        return $this;
    }
    public function getAdapter()
    {
        if (!$this->adapter) {
            $this->setAdapter();
        }
        return $this->adapter;
    }
    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
        return $this;
    }

    public function getPrimaryKey()
    {
        if (!$this->primaryKey) {
            $this->setPrimaryKey("id");
        }
        return $this->primaryKey;
    }
    public function setData($data)
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }
    public function getData()
    {
        if (!$this->data) {
            return false;
        }
        return $this->data;
    }
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }
    public function getTableName()
    {
        if (!$this->tableName) {
            $this->setTableName('product');
        }
        return $this->tableName;
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }
    public function __get($key)
    {
        if (!array_key_exists($key, $this->data)) {
            return null;
        }
        return $this->data[$key];

    }
    public function save($Id = null)
    {


        if (!array_key_exists($this->getPrimaryKey(), $this->data)) {

            $keys = "`" . implode("`,`", array_keys($this->data)) . "`";
            $values = "'" . implode("','", $this->data) . "')";
            $query = "INSERT INTO `{$this->getTableName()}`({$keys}) VALUES ({$values}";

            if (!$Id = $this->getAdapter()->insert($query)) {
                return false;
            }



        } else {
            $Id = $this->data[$this->getPrimaryKey()];

            foreach ($this->data as $key => $value) {
                $pair[] = "`{$key}`='{$value}'";
            }
            $query = "UPDATE `{$this->getTableName()}` SET " . implode(',', $pair) . " WHERE `{$this->getPrimaryKey()}` = {$Id}";

            if (!$this->getAdapter()->update($query)) {

            }

        }
        $this->load($Id);
        //return $Id;
        return $this;

    }
    public function load($value)
    {
        $value = (int)$value;
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`={$value}";
        $productData = $this->fetchRow($query);
        if (!$productData) {
            return false;
        }
        return $this;

    }
    public function delete($productId = null)
    {
        if (!$productId) {
            if (!array_key_exists($this->getPrimaryKey(), $this->data)) {
                return false;
            }
            $productId = $this->data[$this->getPrimaryKey()];
        }

        $query = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`='{$productId}'";

        if (!$this->getAdapter()->delete($query)) {
            return false;
        }
        return $this;
    }
    public function fetchRow($query = null)
    {
        $row = $this->getAdapter()->fetchRow($query);
        if (!$row) {
            return false;
        }
        $this->data = $row;
        return $this;
    }
    public function fetchAll($query = null)
    {
        if (!$query) {
            $query = "SELECT * FROM `{$this->getTableName()}`";
        }
        $Products = $this->getAdapter()->fetchAll($query);
        if (!$Products) {
            return false;
        }
        foreach ($Products as $key => &$value) {
            $row = new $this;
            $value = $row->setData($value);

        }
        $collectionClassName = get_class($this) . '\Collection';
        $collection = \Mage::getModel($collectionClassName);
        $collection->setData($Products);
        unset($Products);
        return $collection;
    }
}

?>