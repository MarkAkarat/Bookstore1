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
    public function show_info(){
        $sql = "SELECT * FROM 'book'";
        $result = $this->dbCon->query($sql);
        echo "<table border='1'>";
        $count = 0;
        while($row = $result->fetch_assoc()){
            if($count == 0){
                echo "<tr>";
                foreach ($row as $key => $value){
                    echo "<th>{$key}</th>";
                }
                echo "<th>EDIT</th>";
                echo "<th>Delete</th>";
                echo "</tr>";
                $count++;
            }
            echo "<tr>";
            foreach ($row as $key => $value){
                echo "<td>{$value}</td>";
            }
            echo "<td><a href='formEdit.php?cusId={$row['id']}'>Edit</a></td>";
            echo "<td><a href='formEdit.php?delete_id={$row['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
}
?>