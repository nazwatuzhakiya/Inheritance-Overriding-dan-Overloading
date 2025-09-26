<?php
class Dog {
    public function bark() {
        echo "woof <br>";
    }
}

class Hound extends Dog {
    // Overriding method bark() dari class Dog
    public function bark() {
        echo "bowl <br>";
    }
}

// Contoh penggunaan
$dog = new Dog();
$dog->bark();    // Output: woof

$hound = new Hound();
$hound->bark();  // Output: bowl
?>