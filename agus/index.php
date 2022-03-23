<?php

require_once '../config.php';

session_start();
include 'header.php';
$alert='';

if(isset($_POST['login'])){
  $user = $_POST['username'];
  $pass = md5($_POST['password']);
  $query = mysqli_query($connect, "SELECT * FROM tblclient WHERE idClient='$user' and ua='$pass'");

  if(mysqli_num_rows($query)>0){
    $_SESSION['user'] = $user;
  }else{
    $alert = '<div class="alert alert-warning">Login Gagal, pastikan username dan pasword benar!</div>';
    session_destroy();
  }
}else if(isset($_GET['logout'])){
  session_destroy();
  header('location:../'.$folderadmin.'/?pesan=Berhasil+Logout');
}

if(!empty($_SESSION['user'])){
  include 'admin.php';
}else{
if(isset($_GET['pesan'])){
  $alert = '<div class="alert alert-success">'.$_GET['pesan'].'</div>';
}
?>

<div class="jumbotron-fluid admin-login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 bg-white pt-3 pb-5 pl-5 pr-5 text-center">
        <h2>Login to Admin Panel</h2>
        <hr>
        <?php echo $alert; ?>
        <form action="../<?php echo $folderadmin;?>/" method="post">
          <input class="form-control" type="text" name="username" placeholder="Username">
          <input class="form-control" type="password" name="password" placeholder="Password">
          <input type="submit" class="btn btn-primary" name="login" value="Login">
        </form>
      </div>
    </div>
  </div>
</div>
<?php
}

echo $footer;
?>