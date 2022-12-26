<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
<div><?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $name_reg = "/^[a-zA-Z ]*$/";
    $phone_reg = "/^[0-9]{14}$/";
    $date_reg = "/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/";
    $pass_reg = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    $val_name = preg_match($name_reg, $_POST["user_name"]);
    $val_email=(filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL));
    $val_phone = preg_match($phone_reg, $_POST["user_phone"]);
    $val_date = preg_match($date_reg, $_POST["user_birth"]);
    $val_pass = preg_match($pass_reg, $_POST["user_pass"]);
    $val_repass = ($_POST["user_pass"] === $_POST["user_repass"]);
    if (($val_repass && $val_pass && $val_date && $val_phone && $val_email && $val_name)) {
        require_once('config.php');
        $sql = "INSERT INTO users (name, email, phone, birthday_date, password) VALUES ('$_POST[user_name]','$_POST[user_email]','$_POST[user_phone]','$_POST[user_birth]','$_POST[user_pass]')";
        $conn->query($sql);
    }
    else {
        echo "invalid <br>";
    }
    if (!($val_repass)) {
        echo "repass <br>";
    }
    if (!($val_pass)) {
        echo "pass <br>";
    }
    if (!($val_date)) {
        echo "date <br>";
    }
    if (!($val_phone)) {
        echo "phone <br>";
    }
    if (!($val_email)) {
        echo "mail <br>";
    }
    if (!($val_name)) {
        echo "name <br>";
    }
    }
?></div>
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Your Name</label>
                      <input type="text" id="form3Example1c" class="form-control" name="user_name"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Your Email</label>
                      <input type="email" id="form3Example3c" class="form-control" name="user_email"/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Phone Number</label>
                      <input type="text" id="form3Example3c" class="form-control" name="user_phone"/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Date Of Birth</label>
                      <input type="text" id="form3Example3c" class="form-control" name="user_birth"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" id="form3Example4c" class="form-control" name="user_pass"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      <input type="password" id="form3Example4cd" class="form-control" name="user_repass"/>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $name_reg = "/^[a-zA-Z ]*$/";
    $phone_reg = "/^[0-9]{14}$/";
    $date_reg = "/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/";
    $pass_reg = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    $val_name = preg_match($name_reg, $_POST["user_name"]);
    $val_email=(filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL));
    $val_phone = preg_match($phone_reg, $_POST["user_phone"]);
    $val_date = preg_match($date_reg, $_POST["user_birth"]);
    $val_pass = preg_match($pass_reg, $_POST["user_pass"]);
    $val_repass = ($_POST["user_pass"] === $_POST["user_repass"]);
    if (($val_repass && $val_pass && $val_date && $val_phone && $val_email && $val_name)) {
        require_once('config.php');
        $sql = "INSERT INTO users (name, email, phone, birthday_date, password) VALUES ('$_POST[user_name]','$_POST[user_email]','$_POST[user_phone]','$_POST[user_birth]','$_POST[user_pass]')";
        $conn->query($sql);
    }
    else {
        echo "invalid";
    }
    // if (!($val_repass)) {
    //     echo "repass";
    // }
    // if (!($val_pass)) {
    //     echo "pass";
    // }
    // if (!($val_date)) {
    //     echo "date";
    // }
    // if (!($val_phone)) {
    //     echo "phone";
    // }
    // if (!($val_email)) {
    //     echo "mail";
    // }
    // if (!($val_name)) {
    //     echo "name";
    // }
    }
?>