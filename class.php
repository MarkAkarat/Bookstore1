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
        }
        $this->dbCon->query("SET NAMES UTF8");
    }
    public function disconnect(){
        $this->dbCon->close();
    }
    public function show_info(){
        $sql = "SELECT * FROM `book` ";
        $result = $this->dbCon->query($sql);
        //print_r($sql);
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
            echo "<td><a href='formEdit.php?cusId={$row['BookID']}'>Edit</a></td>";
            echo "<td><a href='handle.php?delete_id={$row['BookID']}'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function insertdata($info){
        {
            $insertall = "INSERT INTO `book`(`BookID`, `BookName`, `TypeID`, `StatusID`, `Publish`, `UnitPrice`, `UnitRent`, `DayAmount`, `Picture`) 
            VALUES ('{$info['BookID']}','{$info['BookName']}','{$info['TypeID']}','{$info['StatusID']}','{$info['Publish']}','{$info['UnitPrice']}','{$info['UnitRent']}','{$info['DayAmount']}','{$info['Picture']}')";
            echo $insertall;
            $rsInsert = $this->dbCon->query($insertall);
        }
    }

    public function deleteID($id){
        $deleteq = "DELETE FROM `book` WHERE `BookID` = {$id}";
        $rsdel = $this->dbCon->query($deleteq);
        echo "delete Row : {$this->dbCon->affected_rows}<br>";
    }
    public function update_data_all($info){
        
        $updateq = "UPDATE `book` SET `BookID`=['{$info['BookID']}'],`BookName`=['{$info['BookName']}'],
        `TypeID`=['{$info['TypeID']}'],`StatusID`=['{$info['StatusID']}'],`Publish`=['{$info['Publish']}'],`UnitPrice`=['{$info['UnitPrice']}'],`UnitRent`=['{$info['UnitRent']}'],
        `DayAmount`=['{$info['DayAmount']}'],`Picture`=['{$info['Picture']}'] WHERE `BookID`= {$info['BookID']}";
    }

    public function getinfoOne($id){
        $sql = "SELECT * FROM `book` WHERE Id={$id}";
        $result = $result = $this->dbCon->query($sql);
        $row = $result->fetch_assoc();
        return ($row);
    }
}


?>