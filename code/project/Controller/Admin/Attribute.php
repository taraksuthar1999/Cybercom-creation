<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Attribute extends \Controller\Core\Admin
{

    public function gridAction($status = 'success', $msg = null, $messageHtml = null)
    {
        try {

            $attributeGrid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
            $element = [
                [
                    'selector' => '#htmlGrid',
                    'html' => $attributeGrid
                ],
                [
                    'selector' => '#messageHtml',
                    'html' => $messageHtml
                ],
            ];
            $this->responseJson($status, $msg, $element);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->message());
            $this->gridAction();
        }
    }
    public function editAction()
    {
        $attribute = \Mage::getModel('Model\Attribute');
        $attribute->load((int)$this->getRequest()->getGet('id'));
        $edit = \Mage::getBlock('Block\Admin\Attribute\Edit')->setTableRow($attribute)->toHtml();
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

            $attribute = \Mage::getModel('Model\Attribute');

            if ($id = (int)$this->getRequest()->getGet("id")) {
                $attribute = $attribute->load($id);

                if (!$attribute) {

                    throw new Exception("Record not Found");
                }

                $this->getMessage()->setSuccess('Record Edited Successfully');
            } else {

                $this->getMessage()->setSuccess('Record Inserted Successfully');
            }



            $attributeData = $this->getRequest()->getPost('attribute');

            $attribute->setData($attributeData);


            if (!$attribute->save()) {
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
            $attribute = \Mage::getModel('Model\Attribute');
            if (!$attribute = $attribute->load($id)) {
                throw new \Exception('Invalid request Id');
            }
            if (!$attribute->delete()) {
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