<?php

session_start();
$app = __DIR__;

require_once "{$app}/classes/Hash.class.php";
require_once "{$app}/classes/Database.class.php";
require_once "{$app}/classes/Auth.class.php";
require_once("{$app}/classes/Validator.class.php");
require_once("{$app}/classes/ErrorHandler.class.php");
require_once("{$app}/classes/TokenHandler.class.php");
require_once("{$app}/classes/UserHelper.class.php");
require_once("{$app}/classes/MailConfigHelper.class.php");
$database = new Database();
$auth = new Auth($database);
$errorHandler = new ErrorHandler();
$validation = new Validator($database, $errorHandler);
$tokenHandler = new TokenHandler($database);
$userHelper = new UserHelper($database);
$mail = MailConfigHelper::getMailer();

if(isset($_COOKIE['token']) && $tokenHandler->isValid($_COOKIE['token'], 1)) {

    $token = $_COOKIE['token'];

    // i want the user or user id
    $user = $tokenHandler->getUserFromValidToken($token);

    $auth->setAuthSession($user->user_id);
}


?>