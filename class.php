<?php
class Database{
    public $dbCon = null;
    public function connect(){
        define("host","localhost");
        define("username","root");
        define("password","");
        define("database","bookstore");
        $this->dbCon = new mysqli(host,username,password,database);
        if($this->dbCon->connect_error){
            die("Database Connection Error,Error No.:" .
            $this->dbCon->connect_errno . " | " .
            $this->dbCon->connect->connect_error);
            $this->dbCon->query("SET NAMES UTF8");
        }
    }
    public function disconnect(){
        $this->dbCon->close();
    }
}
?>