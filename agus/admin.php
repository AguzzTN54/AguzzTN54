<?php
echo $navbar;
$page = '';
$aksi = '';

$dataPesan = mysqli_query($connect, "SELECT * FROM tblpesan WHERE keterangan='pending'");
$jumlahpesan = mysqli_num_rows($dataPesan);
if($jumlahpesan=='0'){
  $notif1 = '';
}else{
  $notif1 = '<span class="bubble">'.$jumlahpesan.'</span>';
}

if(isset($_GET['page'])){
  $page = $_GET['page'];
}
if(isset($_GET['aksi'])){
  $aksi = $_GET['aksi'];
}
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-3">
      <a href="../<?php echo $folderadmin; ?>/?page=pesanan" class="list-group-item list-group-item-action">Pesanan
        <?php echo $notif1;?></a>
      <a href="../<?php echo $folderadmin; ?>/?page=produk&prd=design"
        class="list-group-item list-group-item-action">Produk Design </a>
      <a href="../<?php echo $folderadmin; ?>/?page=produk&prd=website"
        class="list-group-item list-group-item-action">Produk Website</a>
      <a href="../<?php echo $folderadmin; ?>/?page=clients"
        class="list-group-item list-group-item-action">Pelanggan</a>
      <a href="../<?php echo $folderadmin; ?>/?page=settings" class="list-group-item list-group-item-action">Setting</a>
    </div>

    <div class="col-md-9">
      <?php
      if($page=='produk'){
        include 'alat/produk.php';
      }elseif($page=='pesanan'){
        include 'alat/orders.php';
      }
    ?>
    </div>
  </div>
</div>