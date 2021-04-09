<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Block\Core\Template');

class Form extends \Block\Core\Template
{
    protected $Admin = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/admin/form.php');
    }
    public function setAdmin($Admin = null)
    {
        if (!$Admin) {
            $Admin = \Mage::getModel('Model\Admin');
            if ($AdminId = $this->getRequest()->getGet('id')) {
                $Admin->load($AdminId);
            }

        }
        $this->Admin = $Admin;
        return $this;
    }
    public function getAdmin()
    {
        if (!$this->Admin) {
            $this->setAdmin();
        }
        return $this->Admin;
    }
}

?>