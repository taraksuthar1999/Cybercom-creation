<?php
class car
{
    public $color = 'orange';
    public $comp;
    public $hasSunRoof = true;
    public function hello()
    {
        echo 'name of the company is ' . $this->comp . ' and color of car is ' . $this->color;
    }
}
$bmw = new car();
$bmw->comp = 'bmw';
$bmw->color = 'green';
$bmw->hello();


?>