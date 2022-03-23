<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "agz_design";
$folderadmin = 'agus';

$connect = mysqli_connect($host, $user, $password, $database);

if(!$connect){
  die('Koneksi Gagal '.mysqli_connect_error());
}


?>