<?php
require_once('config.php');
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql = "delete from users where id = $id";
    $result=$conn->query($sql);
    if ($result){
        header("location:landpage.php");
        }else {
        echo "r";
    }
}