<?php
class car
{
    public $model;
    public function getModel()
    {
        return 'the model name is ' . $this->model;

    }

}
$bmw = new car();
$bmw->model = 'bm2400';
$res = $bmw->getModel();
echo $res;
?>