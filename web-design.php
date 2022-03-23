<?php

$judul = 'Website Design Services ||';
$logoclass1 = 'fil01b';
$logoclass2 = 'fil0a';
$navBg = ' bg-white';
$addClass = '';
include 'config.php';
include 'session.php';
include 'header.php';

?>

<!-- Banner -->
<div class="jumbotron jumbotron-fluid banner web-banner">
  <div class="svg wave waveset wave2"></div>
  <div class="svg wave waveset wave1"></div>
  <div class="container text-banner">
    <div class="row justify-content-end">
      <div class="col-sm-6">
        <div class="kanan">
          <h2 class="landing wow fadeInUp" data-wow-duration="1.4s">
            Website Design <br />
            Services
          </h2>
          <span class="wow fadeInUp" data-wow-duration="1.4s">Melayani pembuatan website, web demo, web platform
            script</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Banner -->

<!-- Pembuka -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <div class="kantor wow bounceInUp" data-wow-duration="1.4s">
        <div class="agus3"></div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="kilasan wow fadeInUp" data-wow-duration="1.4s">
        <span class="sub1">AGZ.DZ</span> Kami juga memberikan jasa pembuatan website dan aplikasi berbasis web lainnya
        dari skala kecil hingga
        menengah. semua dikerjakan oleh tenaga yang ahli di bidangnya. Sangat cocok bagi anda yang ingin merintis
        usaha online atau membangun sebuat platform sederhana berbasis web. pengerjaan web sebagain besar menggunakan
        framework framework yang mendukung sesuai dengan kesepakatan dengan anda.
      </div>
    </div>
  </div>
</div>
<!-- Akhir Pembuka -->

<!-- Produk -->
<div style="background-color:#fafafa;" class="pt-2">
  <h3 class="sub sub-center">Produk Website</h3>
  <div class="container produk">
    <div class="row">
      <?php

      $ambil = mysqli_query($connect, "SELECT * FROM tblproduk WHERE jenisProduk='website'");
      $i=0;
      while($data=mysqli_fetch_assoc($ambil)){
        $i++;
        $idPrd = $data['idProduk'];
        $namaProduk = $data['namaProduk'];
        $harga = $data['harga'];
        $waktu = $data['waktu'];
        $file = $data['ext'];
        $pic = $data['cover'];
        $text = 'Selamat Sore
Nama Saya : ___
Saya mau pesan desain *'.$namaProduk.'*
untuk hari ___ apakah masih bisa?';
        echo'
        <div class="col-md-6 wow bounceInUp" data-wow-delay="0.'.$i.'s" data-wow-duration="1.4s">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-sm-6">
                <div class="thumb">
                  <img src="assets/images/website/'.$pic.'" class="card-img" alt="'.$namaProduk.'">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card-body">
                  <h5 class="card-title sub1">'.$namaProduk.'</h5>
                  <p class="card-text"> <i class="fa fa-tags"></i> <span style="font-size:18px;">'.$harga.'</span> <br/>
                  <i class="far fa-clock"></i> <span style="font-size:18px;">'.$waktu.'</span></p>
                  <p class="card-text"> <i class="far fa-file-archive"></i> '.$file.'</p>
                  <center><center><button type="button" class="btn btn1 tmblpesan" data-toggle="modal" data-target="#modal" id="tombolpesan" data-id="'.$idPrd.'" data-src="assets/images/website/'.$pic.'" data-name="'.$namaProduk.'" data-harga="'.$harga.'"> Pesan Sekarang</button></center></center>
                </div>
              </div>
            </div>
          </div>
        </div>
        ';
      }
      ?>
    </div>
  </div>
</div>
<!-- Akhir Produk -->

<!-- Software -->
<section id="clients" class="pb-3 pt-4 wow fadeInUp">
  <div class="container">
    <div class="owl-carousel clients-carousel">
      <img src="assets/images/software/xd.png" alt="XD">
      <img src="assets/images/software/vscode.png" alt="VS Code">
      <img src="assets/images/software/wordpress.png" alt="WordPress">
      <img src="assets/images/software/joomla.png" alt="Joomla">
      <img src="assets/images/software/web.jpg" alt="Web">
      <img src="assets/images/software/bootstrap.png" alt="Bootstrap">
      <img src="assets/images/software/php.png" alt="PHP">
      <img src="assets/images/software/mysql.png" alt="MySQL">
      <img src="assets/images/software/CI.png" alt="CodeIgniter">
      <img src="assets/images/software/laravel.png" alt="Laravel">
      <img src="assets/images/software/android.png" alt="Android">
    </div>
  </div>
</section>
<!-- Akhir Software -->


<?php
include 'footer.php';
?>