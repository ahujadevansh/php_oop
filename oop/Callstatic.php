<?php

class StudentModel {

    static function find($args) {
        $query = "SELECT * FROM student WHERE ".$args['field'] ." ". $args['operator'] ." ". $args['value'];
        return $query;
    }

    static function __callStatic($method, $arguments)
    {
        if(preg_match('/^findBy(.+)$/', $method,$matches)) {
            return static::find(array('field'=>$matches[1], 'value'=>$arguments[0], 'operator'=> $arguments[1]));
        }
    }
}


echo StudentModel::findById("Hello", "like");

?>