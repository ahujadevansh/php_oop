<?php

class Auth {

    protected $database;
    protected $table = 'users';
    protected $authSession = 'user';

    public function __construct(Database $database) 
    {
        $this->database = $database;
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
        unset($_SESSION[$this->authSession]);
    }

}



?>