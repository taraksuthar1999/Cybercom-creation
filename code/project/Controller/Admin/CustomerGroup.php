<?php
namespace Controller\Admin;



\Mage::loadFileByClassName('Controller\Core\Admin');


class CustomerGroup extends \Controller\Core\Admin
{
    protected $customerGroups = [];
    protected $customerGroup = null;
    public function setCustomerGroup($customerGroup = null)
    {
        if (!$customerGroup) {
            $customerGroup = \Mage::getModel('Model\CustomerGroup');


        }
        $this->customerGroup = $customerGroup;
        return $this;
    }
    public function getCustomerGroup()
    {
        if (!$this->customerGroup) {
            $this->setCustomerGroup();
        }
        return $this->customerGroup;
    }
    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction($status = 'success', $msg = null, $messageHtml = null)
    {
        try {
            $grid = \Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
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
            $this->responseJson($status, $msg, $element);

            // $layout = \Mage::getBlock('Block\Core\Layout');
            // $layout->getChild('Content')->addChild('grid', \Mage::getBlock('Block\Admin\CustomerGroup\Grid'));
            // echo $layout->toHtml();
        } catch (Exception $e) {

            $this->getMessage()->setFailure($e->getMessage());
            die();
        }


    }
    public function getCustomerGroups()
    {
        return $this->customerGroups;
    }
    public function setCustomerGroups($customerGroups)
    {
        $this->customerGroups = $customerGroups;
        return $this;
    }


    public function saveAction()
    {

        try {
            $customerGroup = $this->getCustomerGroup();
            if ($id = (int)$this->getRequest()->getGet("id")) {
                $customerGroup = $customerGroup->load($id);

                if (!$customerGroup) {

                    throw new Exception("Record not Found");
                }
                $customerGroup->updatedDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess('Record Edited Successfully');
            } else {
                $customerGroup->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess('Record Inserted Successfully');
            }



            $customerGroupData = $this->getRequest()->getPost('customerGroup');

            $customerGroup->setData($customerGroupData);

            $customerGroup->save();

           // $this->redirect('grid', null, null, true);


        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
           // $this->redirect('grid', null, null, true);
        }
        $messageHtml = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();
        $this->gridAction('success', null, $messageHtml);



    }
    public function editAction()
    {

        try {

            echo $edit = \Mage::getBlock('Block\Admin\CustomerGroup\Edit')->toHtml();
            $element = [
                [
                    'selector' => '#htmlGrid',
                    'html' => $edit
                ],
            ];
            $this->responseJson('success', null, $element);
        //     $layout = \Mage::getBlock('Block\Core\Layout');
        //    // $layout->setTemplate('view/layout/twoColumnStructure.php');
        //     $layout->getChild('Content')->addChild('edit', \Mage::getBlock('Block\Admin\CustomerGroup\edit'));
        //     echo $layout->toHtml();

        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

    }

    public function deleteAction()
    {
        $customerGroupId = (int)$this->getRequest()->getGet('id');
        if (!$customerGroupId) {
            throw new Exception("Error processing request");
        }
        $customerGroup = $this->getCustomerGroup();
        $customerGroup->load($customerGroupId);
        $customerGroup->delete($customerGroupId);
        $this->redirect('grid', null, null, true);

    }


}

?>