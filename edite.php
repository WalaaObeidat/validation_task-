<?php
require_once('config.php');
$id = $_GET["editeid"];
$sql = "SELECT * FROM `users` WHERE id = $id";
// echo "<pre>";
// print_r((($conn->query($sql))->fetchAll(PDO::FETCH_ASSOC))[0]);
// echo "</pre>";
$result =(($conn->query($sql))->fetchAll(PDO::FETCH_ASSOC))[0];
// echo "<pre>";
// print_r($result);
// echo "</pre>";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $e_name = $_POST['e_name'];
    $e_email = $_POST['e_email'];
    $e_phone = $_POST['e_phone'];
    $e_pass = $_POST['e_pass'];
    $e_is_admin = $_POST['e_is_admin'];
    $sql = "UPDATE users SET `name`='$e_name',`email`='$e_email',`phone`='$e_phone',`password`='$e_pass',`is_admin`='$e_is_admin' WHERE id = $id";
    $result = $conn->exec($sql);
    if ($result){
        header("location:landpage.php");
    }else {
        echo "Data NOT inserted";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edite_employee</title>
    <style>
    </style>
</head>
<body>
    <div style="margin: auto;">
        <form method="POST" >
            <label>
                Name:
            </label>
            <br>
            <input type="text" name ="e_name" value=<?php
            echo $result["name"];
            ?>>
            <hr>
            <label>
            email:
            </label>
            <br>
            <input type="text" name ="e_email" value=<?php
            echo $result["email"];
            ?>>
            <hr>
            <label>
                Phone Number:
            </label>
            <br>
            <input type="text" name ="e_phone" value=<?php
            echo $result["phone"];
            ?>>
            <hr>
            <label>
                Password:
            </label>
            <br>
            <input type="text" name ="e_pass" value=<?php
            echo $result["password"];
            ?>>
            <hr>
            <label>
                Is admin:
            </label>
            <br>
            <input type="text" name ="e_is_admin" value=<?php
            echo $result["is_admin"];
            ?>>
            <hr>
            <button type="submit">update</button>
        </form>
    </div>
</body>
</html>
