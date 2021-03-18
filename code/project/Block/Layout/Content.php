<?php
namespace Block\Layout;

class Content extends \Block\Core\Template
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/layout/content.php');

    }


}

?>