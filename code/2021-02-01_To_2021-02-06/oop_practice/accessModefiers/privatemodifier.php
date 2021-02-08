<?php

class car
{
    private $model;
    private function getModel()
    {
        return 'the model name is ' . $this->model;

    }

}
$bmw = new car();
$bmw->model = 'bm2400';
$res = $bmw->getModel();
echo $res;

?>