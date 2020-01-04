<?php

class GeetersSetters {
    protected $__data = array('name'=> false, 'email'=>false);

    public function __get($property) {
        if(!isset($property)) {
            return false;
        }
        else {
            return $this->$property;
        }
    }

    public function __set($property,$value) {
        if(isset($property)) {
            $__data['$property'] = $value;
        }
        else {
            echo '<br> you cannot set anything <br>';
        }
    }

    public function __isset($property) {
        return isset($this->__data[$property]);
    }

    public function __unset($property) {
        if(isset($this->__data[$property]))
        {
            unset($this->__data[$property]);
        }  
    }
}


$obj = new GeetersSetters();
$obj->name = "Devansh";
echo $obj->name;

$obj->fakeproperty = "fake";
echo $obj->fakeproperty;

echo isset($obj->name);
unset($obj->name);

?>