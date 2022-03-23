<?php
include 'config.php';

$atas = '<div class="jumbotron-fluid admin-login">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 bg-white pt-3 pb-3 pl-5 pr-5 text-center">';
$footer = '</div>
  </div>
  <div class="madeby madeby2">
    Made With <i class="fa fa-heart"></i> by Agus
  </div>
</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/mobile-nav.js"></script>
<script src="assets/js/easing.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/main.js"></script>';

if(isset($_POST['kirim'])){
  $judul = 'Pemesanan Produk ||';
  $logoclass1 = 'fil01b';
  $logoclass2 = 'fil0';
  $addClass = 'text-white';
  include 'session.php';
  include 'header.php';

  echo $atas;
  if(isset($_POST['nama'])){
    $nama = $_POST['nama'];
  }else if(isset($dataClientSesi['namaClient'])!=''){
    $nama = $dataClientSesi['namaClient'];
  }
  if(isset($_POST['email'])){
    $email = $_POST['email'];
  }else if(isset($dataClientSesi['email'])!=''){
    $email = $dataClientSesi['email'];
  }
  $nohp = $_POST['nohp'];
  $alamat = $_POST['alamat'];
  $pesan = $_POST['pesan'];
  $idProduk = $_POST['idProduk'];
  $idClient = $_POST['idClient'];
  $ip = $_SERVER['SERVER_ADDR'];
  $ua = $_SERVER['HTTP_USER_AGENT'];
  $tgl = date('Y-m-d');

  $prd = mysqli_fetch_assoc(mysqli_query($connect, "SELECT namaProduk FROM tblproduk WHERE idProduk='$idProduk'"));
  $sukses = '<div class="check"><i class="far fa-check-circle"></i></div>
  <p class="pt-3">Pemesanan <b>'.$prd['namaProduk'].'</b> berhasil. kami akan menghubungi anda dalam 1x24 jam via Whatsapp. Apabila kami tidak
  segera menanggapi, anda bisa mengirim pesan Whatsapp kepada kami.</p>
  <p>Kami Anjurkan Untuk mengirim pesan Whatsapp kepada kami sekarang</p>';
  $gagal = '<div class="times"><i class="far fa-times-circle"></i></div>
  <p class="pt-3">Pemesanan <b>'.$prd['namaProduk'].'</b> Gagal, silakan memesan melalui Whatsapp, klik tombol di bawah untuk melakukan pemesanan via Whatsapp</p>';

  if(!empty($idClient)){
    $_SESSION['idClient'] = $idClient;
    $update = mysqli_query($connect, "UPDATE `tblclient` SET `noHP`='$nohp', `alamat`='$alamat',`ipAddress`='$ip',`ua`='$ua' WHERE `idClient`='$idClient'");
    
      $inputpesan = mysqli_query($connect, "INSERT INTO `tblpesan`(`idClient`, `tglPesan`, `pesan`, `keterangan`, `idProduk`) VALUES ('$idClient','$tgl','$pesan','pending','$idProduk')");
      if(mysqli_affected_rows($connect)){
        echo $sukses;
      }else{
        echo $gagal;
      }

  }else{
    $cek = mysqli_fetch_assoc(mysqli_query($connect, "SELECT id FROM tblclient ORDER BY id DESC"));
    $cekduplikat = mysqli_query($connect, "SELECT id FROM tblclient where email='$email'");
    if(mysqli_num_rows($cekduplikat)>0){
      echo '<script>window.history.back();</script>';
    }else{
      $idCL = 'Client'.($cek['id']+1);
      $_SESSION['idClient'] = $idCL;
      $inputClient = mysqli_query($connect, "INSERT INTO `tblclient`(`idClient`, `namaClient`, `email`, `noHP`, `tglDaftar`, `alamat`, `ipAddress`, `ua`) VALUES ('$idCL','$nama','$email','$nohp','$tgl','$alamat','$ip','$ua')");
      
      if(mysqli_affected_rows($connect)){
        $inputpesan = mysqli_query($connect, "INSERT INTO `tblpesan`(`idClient`, `tglPesan`, `pesan`, `keterangan`, `idProduk`) VALUES ('$idCL','$tgl','$pesan','pending','$idProduk')");
        if(mysqli_affected_rows($connect)){
          echo $sukses;
        }else{
          echo $gagal;
        }
      }else{
        echo $gagal;
      }
    }
  }
  $pesanWA = 'Nama Produk : *'.$prd['namaProduk'].'*
Nama : '.$nama.'
Email : '.$email.'
Deskripsikan detail produk yang diinginkan :';
?>
<a href="https://api.whatsapp.com/send?phone=6285232747206&text=<?php echo urlencode($pesanWA);?>" target="_blank"
  rel="noopener noreferrer" class="btn btn-success pt-2" style="font-size:larger;"><i class="fab fa-whatsapp"></i> Kirim
  Pesan Whatsapp Sekarang </a>
<br>
<a href="./index.php" class="btn btn1 pt-2" style="border-radius:5px; !important"><i class="fa fa-home"></i>
  Kembali Ke Awal</a>

<?php
  echo $footer;

}else if(isset($_GET['check'])){
  $email = $_POST['email'];
  $cek =  mysqli_query($connect, "SELECT * FROM tblclient WHERE email='$email'");

  if(mysqli_num_rows($cek) > 0){
    $data = mysqli_fetch_assoc($cek);
    $json['namaclient'] = $data['namaClient'];
    $json['idClient'] = $data['idClient'];
    $json['nohp'] = $data['noHP'];
    $json['alamat'] = $data['alamat'];
    $json['disable'] = 'disabled';
    $json['msg'] = 'tidak tersedia';
  }else{
    $json['msg'] =  'tersedia';
  }
  echo json_encode($json);
}else{
  $judul = 'My Orders ||';
  $logoclass1 = 'fil01b';
  $logoclass2 = 'fil0';
  $addClass = 'text-white';
  include 'session.php';
  include 'header.php';
  $pending[] = '';
  $diterima[] = '';
  $ditolak[] = '';
  $dibatalkan[] = '';
  $selesai[] = '';

  echo $atas;
   
  if($sesiIdClient!=''){
    $dataPesanSesi2 = mysqli_query($connect, "SELECT * FROM `tblpesan` WHERE `idClient`='$sesiIdClient' ORDER BY `id` DESC");
    $totalOrder = mysqli_num_rows($dataPesanSesi2);
    $i= 0;
    while ($pesanan = mysqli_fetch_assoc($dataPesanSesi2)) {
      $i++;
      $idPrdPesan = $pesanan['idProduk'];
      $tglpesan = $pesanan['tglPesan'];
      $textPesan = $pesanan['pesan'];
      $keterangan = $pesanan['keterangan'];
      $produk = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM tblproduk WHERE idProduk='$idPrdPesan'"));
      $NamaPrdPesan = $produk['namaProduk'];
      $jenisPrd = $produk['jenisProduk'];
      $thumb = $produk['cover'];
      $btl = '<button type="button" class="btn btn-danger batal" data-toggle="modal" data-target="#modal" data-id="'.$idPrdPesan.'"> Batalkan Pemesanan</button>';
      $testi = '<button type="button" class="btn btn-primary btn-testi" data-toggle="modal" data-target="#modal" data-id="'.$idPrdPesan.'"> Kirim Testimoni</button>';

      if($keterangan=='pending'){
        $warna = 'warning';
        $pending[] = 'Y';
        $btn = 'btl';
      }elseif($keterangan=='diterima'){
        $diterima[] = 'Y';
        $warna = 'success';
        $btn = 'no';
      }elseif($keterangan=='ditolak'){
        $ditolak[] = 'Y';
        $warna = 'danger';
        $btn = 'no';
      }elseif($keterangan=='selesai'){
        $selesai[] = 'Y';
        $warna = 'light';
        $btn = 'testi';
      }elseif($keterangan=='batal'){
        $dibatalkan[] = 'Y';
        $warna = 'dark';
        $btn = 'no';
      }
      if($btn=='btl'){
        $button = $btl;
      }elseif($btn=='testi'){
        $button = $testi;
      }else{
        $button ='';
      }
        $out[] = '<div class="alert alert-'.$warna.' list-pesan">
          <div class="row justify-content-center">
            <div class="col-1">
              '.$i.'
            </div>
            <div class="col">
              <div class="row">
                <div class="col-md-5">
                  <img src="./assets/images/'.$jenisPrd.'/'.$thumb.'" alt="" class="picPesan">
                  <span class="d-block"> <b> <i class="fa fa-info-circle"></i> '.$keterangan.'</b></span>
                </div>
                <div class="col-md-7">
                  <h5>'.$NamaPrdPesan.'</h5>
                  <p class="pesan" style="font-size:smaller"> '.substr($textPesan,0,25).'</p>
                  '.$button.'
                </div>
              </div>
            </div>
          </div>
        </div>';
    }
    echo '<h3>MY ORDERS</h3>
    <hr>
    <h4 style="color:#691291">'.strtoupper($sesinamaClient).'</h4>
    <div style="text-align:left !important">
      <div class="row">
        <div class="col-4">
          <span>Total Orders : <b>'.$totalOrder.'</b></span> 
        </div>
        <div class="col-4">
          <span>Pending : <b>'.(count($pending)-1).'</b></span> 
        </div>
        <div class="col-4">
          <span>Diterima : <b>'.(count($diterima)-1).'</b></span>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <span>Ditolak : <b>'.(count($ditolak)-1).'</b></span> 
        </div>
        <div class="col-4">
          <span>Dibatalkan : <b>'.(count($dibatalkan)-1).'</b></span>
        </div>
        <div class="col-4">
          <span>Selesai : <b>'.(count($selesai)-1).'</b></span>
        </div>  
      </div>
    </div>
    ';
    echo implode('',$out);
    echo $footer;
  }else{
    
  }
}
?>