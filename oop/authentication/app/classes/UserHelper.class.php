<?php 

class UserHelper {

    private $database;
    private $table = 'users';

    public function __construct(Database $db)
    {
        $this->database = $db;
    }

    public function getUserByEmail(string $email) {
        return $this->database->table($this->table)->where('email', '=', $email)->first();
    }

    public function getUserByUsername(string $username) {
        return $this->database->table($this->table)->where('username', '=', $username)->first();
    }

    public function resetUserPassword(string $token, string $password) {
        $password = $this->database->query("UPDATE users, tokens SET users.password = '$password', tokens.expires_at = Now() WHERE users.id = tokens.user_id and tokens.token = '$token'");
    }

}


?>