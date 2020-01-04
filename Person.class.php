<?php

require_once("Address.class.php");

class Person{

    protected $name;
    protected $address;

    public function __construct() {
        $this->address = new Address();
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function __call($method, $arguments){
        if(method_exists($this->address, $method))
        {
            return call_user_func_array(array($this->address,$method),$arguments);
        }
    }

    public function __clone(){
        $this->address = clone $this->address;
    }
}

?>