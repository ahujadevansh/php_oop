<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "address_book";

//  SET CONNECTION USING CONNECTION STRING!
$dsn = "mysql:host={$host};dbname={$db}";

//CREATE AN OBJECT OF PDO
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

#query()
$stmt = $pdo->query("SELECT * FROM contacts");

// var_dump($stmt);
// while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     var_dump($row['first_name']);
// }

// while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
//     var_dump($row['first_name']);
// }

// while($row = $stmt->fetch()) {
//     var_dump($row['first_name']);
// }

#prepared statement
$first_name = "%p%";

//POSITIONAL PARAMETERS

// $sql = "SELECT * FROM contacts WHERE first_name=?";
// $ps = $pdo->prepare($sql);

// $ps->execute([$first_name]);
// var_dump($ps);

while($row = $ps->fetch() ) {
    var_dump(($row->first_name));
}

$users =  $ps->fetchall();
var_dump($users);

foreach($users as $user) {
    echo $user->first_name;
}

class Test {
    private $data;

    function __set($name,$value) {
        $this->data[$name] = $value;
    }

    function __get($name) {
        return $this->data[$name];
    }

}

class User {
    private $id;
    private $first_name;
    private $last_name;
}

// $obj = new User();

$sql = "SELECT id,first_name,last_name FROM contacts";
$ps = $pdo->prepare($sql);
// $ps->setFetchMode(PDO::FETCH_INTO, $obj);
$ps->setFetchMode(PDO::FETCH_CLASS, 'User');
$ps->execute();
$user = $ps->fetch();
var_dump($user);

// $users = $ps->fetchAll();
// var_dump($users);


?>