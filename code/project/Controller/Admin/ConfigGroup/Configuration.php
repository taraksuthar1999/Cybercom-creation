<?php
namespace Controller\Admin\ConfigGroup;

class Configuration extends \Controller\Core\Admin
{
    public function saveAction()
    {
        try {

            $configData = $this->getRequest()->getPost('config');
            foreach ($configData as $status => $data) {
                if ($status == 'exists') {
                    foreach ($data as $configId => $values) {
                        $config = \Mage::getModel('Model\ConfigGroup\Configuration');

                        $config->load($configId);
                        foreach ($values as $key => $value) {
                            $config->$key = $value;
                        }
                        $config->save();
                    }
                }
                if ($status == 'new') {
                    $groupId = $this->getRequest()->getGet('id');

                    $config = \Mage::getModel('Model\ConfigGroup\Configuration');
                    $config->groupId = $groupId;
                    foreach ($data as $key => $value) {
                        $config->$key = $value;
                    }
                    $config->save();
                }
                $this->getMessage()->setSuccess('successfully saved');
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        // $config = \Mage::getModel('Model\ConfigGroup')->load($this->getRequest()->getGet('id'));
        // $grid = \Mage::getBlock('Block\Admin\ConfigGroup\Edit')->setTableRow($config)->toHtml();
        // $messageHtml = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();
        // $element = [
        //     [
        //         'selector' => '#htmlGrid',
        //         'html' => $grid
        //     ],
        //     [
        //         'selector' => '#messageHtml',
        //         'html' => $messageHtml
        //     ],
        // ];
        // $this->responseJson('success', null, $element);
    }
    public function deleteAction()
    {
        try {

            $configId = $this->getRequest()->getGet('id');
            $config = \Mage::getModel('Model\ConfigGroup\Configuration')->load($configId);
            $config->delete();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}

?>