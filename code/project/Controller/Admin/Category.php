<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');



class Category extends \Controller\Core\Admin
{
    protected $Categories = [];
    protected $Category = null;
    public function setCategory($category = null)
    {
        if (!$category) {
            $category = \Mage::getModel('Model\Category');

        }
        $this->Category = $category;
        return $this;
    }
    public function getCategory()
    {
        if (!$this->Category) {
            $this->setCategory();
        }
        return $this->Category;
    }
    public function __construct()
    {
        parent::__construct();
    }

    public function gridAction($status = 'success', $msg = 'null', $messageHtml = null)
    {
        try {
            $htmlGrid = \Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
            $element = [
                [
                    'selector' => '#htmlGrid',
                    'html' => $htmlGrid
                ],
                [
                    'selector' => '#messageHtml',
                    'html' => $messageHtml
                ],
            ];
            $this->responseJson($status, $msg, $element);



        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }


    }
    public function getCategories()
    {
        return $this->Categories;
    }
    public function setProducts($Categories)
    {
        $this->Categories = $Categories;
        return $this;
    }


    public function saveAction()
    {

        try {
            $Category = $this->getCategory();

            if ($id = (int)$this->getRequest()->getGet("id")) {
                if (!$id) {
                    throw new \Exception("Request id Null.");
                }
                $Category = $Category->load($id);
                if (!$Category) {
                    throw new \Exception("Invalid Request Id.");
                }


                $Category->updatedDate = date("Y-m-d H:i:s");




                $this->getMessage()->setSuccess('Category Edited Successfully.');
            } else {
                $Category->createdDate = date("Y-m-d H:i:s");


                $this->getMessage()->setSuccess('Category Created Successfully.');

            }
            $categoryPathId = $Category->pathId;
            if (!$categoryData = $this->getRequest()->getPost('category')) {
                throw new \Exception("Empty Data Received.");
            }

            $Category->setData($categoryData);

            if (!$Category->save()) {
                throw new \Exception("Error Saving Data.");
            }

            $Category->updatePathId();


            $Category->updateChildrenpathIds($categoryPathId);

            $messageHtml = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();
            //$this->redirect('grid', null, null, true);


        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());

        }
        $this->gridAction('success', 'null', $messageHtml);



    }
    public function editAction()
    {

        try {

            $category = \Mage::getModel('Model\Category');
            $category->load((int)$this->getRequest()->getGet('id'));

            $htmlEdit = \Mage::getBlock('Block\Admin\Category\Edit')->setTableRow($category)->toHtml();

            $element = [
                [
                    'selector' => '#htmlGrid',
                    'html' => $htmlEdit
                ],

            ];
            $this->responseJson('success', 'null', $element);

        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }

    }

    public function deleteAction()
    {
        try {
            $categoryId = (int)$this->getRequest()->getGet('id');
            if (!$categoryId) {
                throw new \Exception("Request Id Null.");
            }
            $category = $this->getCategory();

            if (!$category->load($categoryId)) {
                throw new \Exception("Invalid Request Id");
            }
            $parentId = $category->parentId;
            $pathId = $category->pathId . "=>";
            $category->updateChildrenPathIds($pathId, $parentId);
            if (!$category->delete($categoryId)) {
                throw new \Exception("Error Deleting the Record.");
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.');
            //$this->redirect('grid', 'Category', null, true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
           // $this->redirect('grid', 'category', null, true);
        }
        $messageHtml = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();
        $this->gridAction('success', 'null', $messageHtml);
    }


}
?>