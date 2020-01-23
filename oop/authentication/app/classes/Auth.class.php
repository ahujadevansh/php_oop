<?php

class Auth {

    protected $database;
    protected $table = 'users';
    protected $authSession = 'user';
    protected $tokenHandler;
    public function __construct(Database $database) 
    {
        $this->database = $database;
        $this->tokenHandler = new TokenHandler($database);
    }

    public function build() {
        // echo "From Build";
        return $this->database->query(
        "CREATE TABLE IF NOT EXISTS {$this->table}(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, email VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(255) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL)"
        );
    }

    public function create($data) { //$data is mixed array
        // print_r($data);
        if(isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return $this->database->table($this->table)->insert($data);
    }

    public function signIn($data) //$data is mixed array
    {
        $user = $this->database->table($this->table)->where('username', '=', $data['username']);

        if($user->count() == 1) {
            $user = $user->first();

            if(Hash::verify($data['password'], $user->password)) {
                $this->setAuthSession($user->id);
                return true;
            }
        }
        return false;
    }

    public function setAuthSession($id) {
        $_SESSION[$this->authSession] = $id;
    }

    public function check() {
        return isset($_SESSION[$this->authSession]);
    }

    public function signout() {

        $user_id = $_SESSION[$this->authSession];
        $sql = "DELETE FROM tokens WHERE user_id = {$user_id} and is_remember=1";
        $this->database->query($sql);
        setcookie('token', '', time()-5000);
        unset($_SESSION[$this->authSession]);
    }


    public function resetUserPassword(string $token, string $password) {

        if($this->tokenHandler->isValid($token, 0)) {
            $password = Hash::make($password);
            $password_update_flag = $this->database->query("UPDATE users, tokens SET users.password = '{$password}' WHERE users.id = tokens.user_id and tokens.token='{$token}'");
            $token_delete_flag = $this->tokenHandler->deleteToken($token);
            return ($password_update_flag && $token_delete_flag);
        }
        return false;
        
    }
    // returns false if user not loggedin else user object
    public function user() {
        if(!$this->check()) {
            return false;
        }
        $user = $this->database->table($this->table)->where('id', '=', $_SESSION[$this->authSession])->first();
        return $user;
    }

}



?>