<?php
namespace Controller\Admin;

class Test extends \Controller\Core\Admin
{
    public function testAction()
    {
        $n = 8234;
        $d = 6;
        $l = strlen($n);
        for ($i = 1; $i <= $l; $i++) {
            $s = substr($n, 0, $i);
            if ($s % $d == 0) {

            }
        }

    }
}
?>