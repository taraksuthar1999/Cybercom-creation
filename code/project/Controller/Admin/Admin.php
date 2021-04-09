<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');


class Admin extends \Controller\Core\Admin
{
    protected $Admins = [];
    protected $Admin = null;
    public function setAdmin($Admin = null)
    {
        if (!$Admin) {
            $Admin = \Mage::getModel('Model\Admin');

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
    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction()
    {
        try {
            $layout = \Mage::getBlock('Block\Core\Layout');
            $layout->getChild('Content')->addChild('grid', \Mage::getBlock('Block\Admin\Admin\Grid'));
            echo $layout->toHtml();


        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }


    }
    public function getAdmins()
    {
        return $this->Admins;
    }
    public function setAdmins($Admins)
    {
        $this->Admins = $Admins;
        return $this;
    }


    public function saveAction()
    {

        try {
            $Admin = $this->getAdmin();
            if ($id = (int)$this->getRequest()->getGet("id")) {
                $Admin = $Admin->load($id);

                if (!$Admin) {

                    throw new Exception("Record not Found");
                }

            } else {
                $Admin->createdDate = date("Y-m-d H:i:s");
            }



            $AdminData = $this->getRequest()->getPost('Admin');

            $Admin->setData($AdminData);

            $Admin->save();

            $this->redirect('grid', null, null, true);


        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }



    }
    public function editAction()
    {

        try {

            $layout = \Mage::getBlock('Block\Core\Layout');
            $layout->getChild('Content')->addChild('form', \Mage::getBlock('Block\Admin\Admin\Form'));

            echo $layout->toHtml();


        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

    }

    public function deleteAction()
    {
        $AdminId = (int)$this->getRequest()->getGet('id');
        if (!$AdminId) {
            throw new Exception("Error processing request");
        }
        $Admin = $this->getAdmin();
        $Admin->load($AdminId);
        $Admin->delete($AdminId);
        $this->redirect('grid', 'Admin', null, true);

    }
    public function statusAction()
    {
        $productId = $_GET['id'];
        $status = ($_GET['status'] == 0) ? 1 : 0;
        $updatedDate = date('Y-m-d h:i:s');
        $query = "UPDATE `product` SET `status` = '{$status}', `updatedDate` = '{$updatedDate}' WHERE `id` = {$productId}";
        $this->redirect('grid', 'Product', null, true);
    }

}
?>