<?php
namespace Block\Admin;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $Admins = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/grid.php');
    }

    public function setAdmins($Admins = null)
    {
        if (!$Admins) {
            $Admin = \Mage::getModel('Model\Admin');
            $Admins = $Admin->fetchAll();


        }
        $this->Admins = $Admins;
        return $this;
    }
    public function getAdmins()
    {
        if (!$this->Admins) {
            $this->setAdmins();
        }
        return $this->Admins;
    }

}
?>