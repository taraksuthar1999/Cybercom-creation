<?php
namespace Block\Layout;


class Footer extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/layout/footer.php');

    }
}
?>