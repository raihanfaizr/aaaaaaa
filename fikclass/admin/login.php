<?php
session_start();

include_once "../koneksi.php";

if (isset($_POST['login'])){
  $un = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['un']));
  $pw = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['pw']));

  $sql = "SELECT un , pw FROM `minn` WHERE un = '$un' AND pw = PASSWORD('$pw')";

  $result = mysqli_query($conn,$sql);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION["admin"] = true;
    echo"<script>alert('Selamat datang admin !'); location.href='index.php';</script>";
  }else{
    echo"<script>alert('Akun salah gais !');</script>";
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login Admin</title>
    <style>
        .wall-1 {
            padding: 20px 0;
            background: linear-gradient(to bottom right, rgb(0, 0, 0, 0.7), rgb(0, 0, 0, 0.2)), url("../assets/img/wall-1.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: top;
            background-size: cover;
        }
    </style>
  </head>
  <body>
    <section class="material-half-bg wall-1 py-0">
      <div class="cover" style="background: linear-gradient(to bottom right, rgb(255, 211, 18),rgb(194, 94, 0));"></div>
    </section>
    <section class="login-content">
      <div class="login-box">
        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>LOGIN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Email" autofocus name="un">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="pw">
          </div><br>
          <div class="form-group btn-container">
            <button class="btn btn-warning btn-block" type="submit" name="login"><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</button>
          </div>
        </form>
      </div>
    </section>
  </body>
</html>