<?php
include_once("class.php");
$mycon = new Database();
$mycon->connect();
if(isset($_POST['BookID'])){
    $data['BookID'] = $_POST['BookID'];
    $data['BookName'] = $_POST['BookName'];
    $data['TypeID'] = $_POST['TypeID'];
    $data['StatusID'] = $_POST['StatusID'];
    $data['Publish'] = $_POST['Publish'];
    $data['UnitPrice'] = $_POST['UnitPrice'];
    $data['UnitRent'] = $_POST['UnitRent'];
    $data['DayAmount'] = $_POST['DayAmount'];
    $data['Picture'] = $_POST['image'];
   // $data['BookDate'] = $_POST['BookDate'];
    //print_r($data);
    $mycon->insertdata($data);
    header("location: index.php");
}else if(isset($_REQUEST['delete_id'])){
    $mycon->deleteID($_REQUEST['delete_id']);
    header("location: index.php");
}
?>