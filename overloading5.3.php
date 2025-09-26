<?php
class Dog {
    // Method bark dengan parameter opsional
    public function bark($num = 1) {
        for ($i = 0; $i < $num; $i++) {
            echo "woof <br>";
        }
    }
}

// Contoh penggunaan
$dog = new Dog();
$dog->bark();      // Output: woof 
$dog->bark(3);     // Output: woof woof woof 
?>