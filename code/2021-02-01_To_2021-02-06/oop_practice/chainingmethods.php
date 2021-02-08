<?php
class car
{
    public $tank;
    public function fill($float)
    {
        $this->tank += $float;
        return $this;//you can comment this and call the methods normally as well without return statements
    }
    public function ride($float)
    {
        $gallon = $float / 50;
        $this->tank -= $gallon;
        return $this;
    }
}

$bmw = new car();//as the object is created it runs constructor but if there is no constructor it will call default constructor and asign zero as a value by default
//$bmw->fill(100);
//echo $bmw->tank;
$tank = $bmw->fill(10)->ride(40)->tank;
echo $tank;
?>