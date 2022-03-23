<?php
session_start();

$sesiIdClient = '';
$sesinamaClient = '';
$sesiemailClient = '';
$sesiwhatsapp = '';
$sesialamat = '';
$disabled = '';
$use = '';
$keranjang = '';

if(isset($_GET['destroy'])){
  session_destroy();
}elseif(isset($_GET['sesi'])){
	$_SESSION['idClient'] = $_GET['sesi'];
}elseif(!empty(isset($_SESSION['idClient']))){
  $sesiIdClient = $_SESSION['idClient'];
  $dataClientSesi = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM tblclient WHERE idClient='$sesiIdClient'"));
  $dataPesanSesi = mysqli_query($connect, "SELECT * FROM tblpesan WHERE idClient='$sesiIdClient' and keterangan='pending'");
  $jumlahpesan = mysqli_num_rows($dataPesanSesi);

  $sesinamaClient = $dataClientSesi['namaClient'];
  $sesiemailClient = $dataClientSesi['email'];
  $sesiwhatsapp = $dataClientSesi['noHP'];
  $sesialamat = $dataClientSesi['alamat'];
  $disabled = ' disabled="disabled"';
  $use = '<a href="#" class="use" style="font-size:smaller;border-radius:12px;">gunakan email lain</a>';

  if($jumlahpesan=='0'){
    $notif1 = '';
  }else{
    $notif1 = '<span class="bubble">'.$jumlahpesan.'</span>';
  }
  
  $keranjang = '<a class="btn btn-link nav-item nav-link '.$addClass.'" data-toggle="modal" data-target="#modal" > <i class="fa fa-shopping-cart"></i>'.$notif1.'</a>
  <button class="btn btn-link nav-item nav-link '.$addClass.'" data-toggle="modal" data-target="#modal" > <i
  class="fa fa-bell"></i><span class="bubble">'.$jumlahpesan.'</span></buttton>';
}
?>