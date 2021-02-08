<?php
class car
{
    private $model;
    public function setModel($string)
    {
        $this->model = $string;
    }
    public function getModel()
    {
        return $this->model;
    }
}
$bmw = new car();
$bmw->setModel('bmw3600');
echo $bmw->getModel();
?>