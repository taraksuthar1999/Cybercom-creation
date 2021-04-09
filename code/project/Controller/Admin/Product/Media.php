<?php 
namespace Controller\Admin\Product;

\Mage::getController('Controller\Core\Admin');
class Media extends \Controller\Core\Admin
{
    public function saveAction()
    {
        try {

            if ($_FILES) {

                $this->_imageUpload();
                $this->getMessage()->setSuccess('Upload Successfull.');
            } else {

                if (!$image = $this->getRequest()->getPost('image')) {
                    throw new \Exception('Empty Data Recevied');
                }

                foreach ($image as $key => $value) {
                    if ($key == 'data') {
                        foreach ($value as $imageId => $value) {
                            $media = \Mage::getModel('Model\Product\Media');
                            $media->load($imageId);
                            foreach ($value as $key => $value) {
                                $media->$key = $value;
                            }
                            $media->save();
                        }
                    }


                    if ($key == 'base' || $key == 'thumb' || $key == 'small') {
                        $media = \Mage::getModel('Model\Product\Media');
                        $media->load($value);
                        $media->$key = 1;
                        $media->save();
                    }

                }
                $this->getMessage()->setSuccess('Updated Successfully.');

            }
            $this->redirect('edit', 'product');

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('edit', 'product');
        }

    }
    protected function _imageUpload()
    {

        $image = \Mage::getModel('Model\Product\Media');
        if (!$picture = $_FILES['photo']['name']) {
            throw new \Exception("No File Selected");
        }
        $tmp_name = $_FILES['photo']['tmp_name'];

        $path = $image->getImagePath();

        if (!move_uploaded_file($tmp_name, $path . $picture)) {
            throw new \Exception("Error Uploading File.");
        }

        $image->imageName = $picture;
        $image->productId = (int)$this->getRequest()->getGet('id');
        if (!$image->save()) {
            throw new \Exception("Error Saving File");
        }

    }
    public function removeAction()
    {
        try {

            if (!$image = $this->getRequest()->getPost('image')) {
                throw new \Exception('Empty Data Recevied');
            }

            foreach ($image as $key => $value) {
                if ($key == 'remove') {
                    foreach ($value as $id => $remove) {
                        $media = \Mage::getModel('Model\Product\Media');
                        if (!$media->delete($id)) {
                            throw new \Exception('Error Deleting');
                        }

                    }
                    $this->getMessage()->setSuccess('Deleted Successfully.');
                }

            }
            $this->redirect('edit', 'product');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('edit', 'product');
        }

    }

}
?>