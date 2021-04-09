<?php
namespace Controller\Admin;

class ConfigGroup extends \Controller\Core\Admin
{
    public function gridAction($status = "status", $msg = null, $messageHtml = null)
    {
        try {

            $grid = \mage::getBlock('Block\Admin\ConfigGroup\Grid')->toHtml();
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
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->gridAction();
        }
    }
    public function editAction()
    {
        $configGroup = \Mage::getModel('Model\ConfigGroup');
        $configGroup->load((int)$this->getRequest()->getGet('id'));
        $edit = \Mage::getBlock('Block\Admin\ConfigGroup\Edit')->setTableRow($configGroup)->toHtml();
        $element = [
            [
                'selector' => '#htmlGrid',
                'html' => $edit
            ],
            [
                'selector' => '#messageHtml',
                'html' => null
            ],
        ];
        $this->responseJson('success', null, $element);

    }

    public function saveAction()
    {
        try {

            $configGroup = \Mage::getModel('Model\ConfigGroup');

            if ($id = (int)$this->getRequest()->getGet("id")) {
                $configGroup = $configGroup->load($id);

                if (!$configGroup) {

                    throw new Exception("Record not Found");
                }

                $this->getMessage()->setSuccess('Record Edited Successfully');
            } else {
                $configGroup->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess('Record Inserted Successfully');
            }



            $configGroupData = $this->getRequest()->getPost('configGroup');

            $configGroup->setData($configGroupData);


            if (!$configGroup->save()) {
                throw new \Exception('error saving');
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());

        }
        $messageHtml = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();
        $this->gridAction('success', null, $messageHtml);
    }
    public function deleteAction()
    {
        try {

            $id = (int)$this->getRequest()->getGet('id');
            $configGroup = \Mage::getModel('Model\ConfigGroup');
            if (!$configGroup = $configGroup->load($id)) {
                throw new \Exception('Invalid request Id');
            }
            if (!$configGroup->delete()) {
                throw new \Exception('error deleting');
            }

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $messageHtml = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();
        $this->gridAction('success', null, $messageHtml);
    }
}
?>