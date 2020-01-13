<?php

require_once("Person.class.php");

$person1 = new Person();
$person1->setName("vvdvbv");
$person1->setCity("Mumbai");


$person2 = clone $person1;
$person2->setName("aandbd");
$person2->setCity("Thane");

echo "<br>{$person1->getName()} - {$person1->getCity()}";
echo "<br>{$person2->getName()} - {$person2->getCity()}";
?>