<?php

trait Trait1{
    public function sayHello() {
        echo "Hello From Trait1";
    }
}

trait Trait2{
    public function sayHello() {
        echo "Hello From Trait2";
    }
}

class Sample {
    use Trait1, Trait2 {
        Trait1::sayHello insteadof Trait2;
        Trait2::sayHello as sayHelloFromTrait2;
    }

    // public function sayHello() {
    //     echo "Hello From Trait2";
    // }

}

$obj = new Sample();
$obj->sayHello();
$obj->sayHelloFromTrait2();


?>