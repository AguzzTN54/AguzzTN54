<?php

$judul = 'Graphic Design Services ||';
$logoclass1 = 'fil01b';
$logoclass2 = 'fil0a';
$navBg = ' bg-white';
$addClass = '';
include 'config.php';
include 'session.php';
include 'header.php';
?>

<!-- Banner -->
<div class="jumbotron jumbotron-fluid banner graphic-banner">
  <div class="svg wave waveset wave2"></div>
  <div class="svg wave waveset wave1"></div>
  <div class="container text-banner">
    <div class="row justify-content-end">
      <div class="col-sm-6">
        <div class="kanan">
          <h2 class="landing wow fadeInUp" data-wow-duration="1.4s">
            Graphic Design <br />
            Services
          </h2>
          <span class="wow fadeInUp" data-wow-duration="1.4s">Melayani segala macam bentuk desain
            grafis</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Banner -->

<!-- Pembuka -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="kilasan wow fadeInUp" data-wow-duration="1.4s">
        <span class="sub1">AGZ.DZ</span> Kami memiliki tenaga profesional khusus di bidang desain grafis yang
        akan melayani segala macam kebutuhan
        desain anda. Dengan harga yang sangat terjangkau, sudah ada ratusan desain kami kerjakan dan ratusan
        pelanggan
        telah merasa puas. jadilah orang selanjutnya yang merasakan pelayanan kami.
      </div>
    </div>
    <div class="col-md-3">
      <div class="kantor wow bounceInUp" data-wow-duration="1.4s">
        <div class="agus2"></div>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Pembuka -->

<!-- Produk -->
<div style="background-color:#fafafa;" class="pt-2">
  <h3 class="sub sub-center">Produk Desain</h3>
  <div class="container produk">
    <div class="row">
      <?php

      $ambil = mysqli_query($connect, "SELECT * FROM tblproduk WHERE jenisProduk='design'");
      $i=0;
      while($data=mysqli_fetch_assoc($ambil)){
        $i++;
        $namaProduk = $data['namaProduk'];
        $idPrd = $data['idProduk'];
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
                  <img src="assets/images/design/'.$pic.'" class="card-img" alt="'.$namaProduk.'">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card-body">
                  <h5 class="card-title sub1">'.$namaProduk.'</h5>
                  <p class="card-text"> <i class="fa fa-tags"></i> <span style="font-size:18px;">'.$harga.'</span> <br/>
                  <i class="far fa-clock"></i> <span style="font-size:18px;">'.$waktu.' hari</span></p>
                  <p class="card-text"> <i class="far fa-file-archive"></i> '.$file.'</p>
                  <center><button type="button" class="btn btn1 tmblpesan" data-toggle="modal" data-target="#modal" id="tombolpesan" data-id="'.$idPrd.'" data-src="assets/images/design/'.$pic.'" data-name="'.$namaProduk.'" data-harga="'.$harga.'"> Pesan Sekarang</button></center>
                </div>
              </div>
            </div>
          </div>
        </div>
        ';
      }
      ?>

      <div class="col-md-6 wow bounceInUp" data-wow-delay="0.'.$i.'s" data-wow-duration="1.4s">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="card-body">
              <h5 class="card-title sub1">Request Desain</h5>
              <p class="card-text"> Desain yang kamu inginkan belum ada dalam daftar ? jangan kawatir, kamu bisa request
                sekarang, kami ada penawaran khusus buatmu</p>
              <center><a
                  href="https://api.whatsapp.com/send?phone=6285232747206&text=<?php echo urlencode('Saya mau pesan desain');?>"
                  class="btn btn1"> Pesan Sekarang</a></center>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Akhir Produk -->

<!-- Software -->
<section id="clients" class="pb-3 pt-4 wow fadeInUp">
  <div class="container">
    <div class="owl-carousel clients-carousel">
      <img src="assets/images/software/coreldraw.png" alt="CorelDraw">
      <img src="assets/images/software/illustrator.png" alt="Illustrator">
      <img src="assets/images/software/indesign.png" alt="Indesign">
      <img src="assets/images/software/photoshop.png" alt="PhotoShop">
    </div>
  </div>
</section>
<!-- Akhir Software -->



<?php
include 'footer.php';
?>