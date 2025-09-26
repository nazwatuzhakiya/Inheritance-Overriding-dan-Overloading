<?php
class testParent
{
    public function f1()
    {
        echo 1;
    }

    public function f2()
    {
        echo 2;
    }
}

class testChild extends testParent
{
    function f2($a = null)
    {
        if ($a === null) {
            parent::f2();
        } else {
            echo $a;
        }
    }
}

$a = new testChild();
$a->f2('ankur'); // Output: ankur
$a->f2();        // Output: 2
?>