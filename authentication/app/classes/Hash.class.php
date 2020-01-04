<?php

class Hash {

    public static function make($plainText){
        return password_hash($plainText, PASSWORD_BCRYPT, ['cost' =>10]);
    }

    public static function verify($plain, $hash){
        return password_verify($plain, $hash);
    }

}


?>