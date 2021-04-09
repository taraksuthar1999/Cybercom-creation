<?php
namespace Block\Core\Layout;

class Left extends \Block\Core\Template
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/layout/left.php');

    }


}

?>