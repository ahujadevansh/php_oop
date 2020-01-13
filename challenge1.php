<?php
# array of php pass by value
$array1 = [1,2,3,4,5];
var_dump($array1);

function tryit (&$array1) {
    $array1[] = 6;
    return $array1;
}

tryit($array1);
var_dump($array1);
