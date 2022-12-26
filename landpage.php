<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="landing.css">
</head>
    
</html>
<?php
session_start();
require_once("config.php");
echo "<h1>WELLCOME   " .$_SESSION["name"] ."</h1>";
if ($_SESSION["is_admin"]) {
    $sql = "SELECT * FROM users";
$data= $conn->query($sql);
$html = "<table><tbody><tr><th>ID</th><th>NAME</th><th>EMAIL</th><th>PHONE NUM</th><th>BIRTHDAY DATE</th><th>PASSWORD</th><th>DATE_CREATED</th><th>DATE_LAST_LOGIN</th><th>IS_ADMIN</th><th>ACTION</th></tr>";
foreach($data as $row) {
    $e_id = $row['id'];
    $e_name = $row['name'];
    $e_email = $row['email'];
    $e_phone = $row['phone'];
    $e_birthday_date = $row['birthday_date'];
    $e_password = $row['password'];
    $e_created_at = $row['date_created'];
    $e_last_login_at = $row['date_last_login'];
    $e_isadmin = $row['is_admin'];
    $html .= "<tr><td>$e_id</td>";
    $html .= "<td>$e_name</td>";
    $html .= "<td>$e_email</td>";
    $html .= "<td>$e_phone</td>";
    $html .= "<td>$e_birthday_date</td>";
    $html .= "<td>$e_password</td>";
    $html .= "<td>$e_created_at</td>";
    $html .= "<td>$e_last_login_at</td>";
    $html .= "<td>$e_isadmin</td>";
    $html .= "<td><a href='delete.php?deleteid=$e_id'><button>delete</button></a><hr>";
    $html .="<a href='edite.php?editeid=$e_id'><buttont>edite</a></button></a></td></tr>";
}
$html .="</tbody></table>";
echo $html;
}
