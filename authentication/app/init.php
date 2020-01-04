<?php

session_start();
$app = __DIR__;

require_once "{$app}/classes/Hash.class.php";
require_once "{$app}/classes/Database.class.php";
require_once "{$app}/classes/Auth.class.php";
require_once("{$app}/classes/Validator.class.php");
require_once("{$app}/classes/ErrorHandler.class.php");

$database = new Database();
$auth = new Auth($database);
$errorHandler = new ErrorHandler();
$validation = new Validator($database, $errorHandler);



?>