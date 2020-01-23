<?php

class Database {

    protected $host = "localhost";
    protected $db = "authentication";
    protected $username = "root";
    protected $password = "";
    
    protected $table;
    protected $stmt;
    protected $pdo;

    protected $debug = true;

    public function __construct()
    {
        try{
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->username, $this->password);
            if($this->debug) {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }
        catch(PDOException $e) {
            die( $this->debug ? $e->getMessage() : "Error While Connecting!");
        }
    }

    public function query($sql) {
        return $this->pdo->query($sql); // exeqcutes the ddl statement but not dml use execute for dml
    }

    public function table($tablename) {
        $this->table = $tablename;
        return $this;
    }

    public function insert($data) { //$data is mixed array
        $keys = array_keys($data);
        echo "In";
        $fields = "`" . implode("`, `", $keys) . "`";
        $placeholder = ":" . implode(", :", $keys);
        $sql = "INSERT INTO `{$this->table}` ({$fields}) VALUES ({$placeholder})";
        // die($sql);
        $this->stmt = $this->pdo->prepare($sql);
        try
        {
            return $this->stmt->execute($data);
            // die($this->stmt->debugDumpParams());
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function where($field, $operator, $value) {
        $this->stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE {$field} {$operator} :value");

        $this->stmt->execute(["value"=>$value]);

        return $this;
    }

    public function exists($data) { //$data is mixed array
        $field = array_keys($data)[0];
        return $this->where($field, "=", $data[$field])->count() ? true : false;
    }

    public function count() {
        return $this->stmt->rowCount();
    }

    public function get() {
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function first(){
        // $this->stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE {$field} {$operator} :value");

        // $this->stmt->execute(["value"=>$value]);

        return $this->get()[0];
    }


    public function rawQueryExecutor($sql) {
        return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }




}



?>