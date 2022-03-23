<?php

  if(!empty(isset($_GET['prd']))){
    if($_GET['prd'] == 'website'){
      $prd = 'website';
    }else{
      $prd = 'design';
    }
  }else{
    $prd = 'design';
  }
  if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $waktu = $_POST['waktu'];
    $file = $_POST['file'];
    $sampul = $_POST['cover'];
    $jenis = $_POST['jenis'];
    $cek = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM tblproduk ORDER BY id DESC"));
    $idProduk = 'prd'.($cek['id'] + 1);
    
    $tambah = mysqli_query($connect, "INSERT INTO `tblproduk`(`idProduk`, `jenisProduk`, `namaProduk`, `harga`, `waktu`, `ext`, `cover`) VALUES ('$idProduk', '$jenis',' $nama', '$harga', '$waktu', '$file', '$sampul')");

    if(mysqli_affected_rows($connect)){
      $alert = '<div class="alert alert-success">Berhasil Ditambahkan</div>';
    }else{
      $alert = '<div class="alert alert-danger">Gagal Menambahkan</div>';
    }

  }else if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $hapus = mysqli_query($connect, "DELETE FROM `tblproduk` WHERE `id`= '$id'");
    if(mysqli_affected_rows($connect)){
      $alert = '<div class="alert alert-success">Berhasil Dihapus</div>';
    }else{
      $alert = '<div class="alert alert-danger">Gagal Dihapus</div>';
    }
  }else if(isset($_GET['edit'])){

  }
?>

<button type="button" class="btn btn-dark mb-2" data-toggle="modal" data-target="#tambahProduk"> <i
    class="fa fa-plus"></i> Tambah Produk</button>
<!-- Modals -->
<div class="modal fade" id="tambahProduk" tabindex="-1" role="dialog" aria-labElledby="tambahProduk" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Produk <?php echo ucwords($prd); ?></h5>
        <button type="button" class="close" data-dimiss="modal"><span aria-hidden="true">&times</span></button>
      </div>
      <div class="modal-body">
        <form action="../<?php echo $folderadmin;?>/?page=produk&prd=<?php echo $prd; ?>" method="post">
          <label for="Nama Produk"> Nama Produk <?php echo ucwords($prd); ?> :</label>
          <input type="text" class="form-control" placeholder="Nama Produk <?php echo ucwords($prd); ?>" name="nama"
            id="nama" required>
          <label for="harga"> Harga :</label>
          <input type="text" class="form-control" placeholder="50000" name="harga" required>
          <label for="waktu">Waktu Pengerjaan :</label>
          <input type="text" class="form-control" placeholder="2-3 hari" name="waktu" required>
          <label for="alamat"> File yang Didapat :</label>
          <input type="text" class="form-control" placeholder="File yang didapat" name="file" required>
          <label for="pesan">Thumbnail :</label>
          <input type="text" class="form-control" placeholder="Cover" name="cover">
          <div style="text-align:right;">
            <input type="hidden" name="jenis" value="<?php echo $prd; ?>">
            <input type="submit" name="tambah" value="Tambah Produk" class="mt-2 btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modals -->

<?php echo $alert; ?>
<div class="tbl-header">
  <table cellpadding="0" cellspacing="0" border="0">
    <thead>
      <tr>
        <th width="50px">No</th>
        <th width="150px">Cover</th>
        <th>Nama Produk</th>
        <th>Aksi</th>
      </tr>
    </thead>
  </table>
</div>
<div class="tbl-content">
  <table cellpadding="0" cellspacing="0" border="0">
    <tbody>
      <?php
          $query = mysqli_query($connect, "SELECT * FROM tblproduk WHERE jenisProduk='$prd'");
          if(mysqli_num_rows($query)>0){
            $i = 0;
            while ($view = mysqli_fetch_assoc($query)) {
              $i++;
              $id = $view['id'];
              $cover = $view['cover'];
              $namaProduk = $view['namaProduk'];
              echo '<tr>
              <td width="50px">'.$i.'</td>
              <td width="150px"><img src="../assets/images/'.$prd.'/'.$cover.'" width="120px"></td>
              <td><h5>'.$namaProduk.'</h5></td>
              <td><a href="../'.$folderadmin.'/?page=produk&prd='.$prd.'&edit='.$id.'" class="btn btn-primary">Edit</a> <a href="../'.$folderadmin.'/?page=produk&prd='.$prd.'&hapus='.$id.'" class="btn btn-danger">Hapus</a></td>
            </tr>';
            }
            
          }else{
            echo 'tidak ditemukan';
          }
          echo'
        </tbody>
      </table>
    </div>';

    ?>