<?php


if(isset($_GET['kategori'])!=''){
  $kategori = $_GET['kategori'];
}else{
  $kategori = 'pending';
}
?>

<div class="tbl-header">
  <table cellpadding="0" cellspacing="0" border="0">
    <thead>
      <tr>
        <th style="width:30px;">No</th>
        <th style="max-width:170px;width:20%">Client</th>
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
$dataPesan = mysqli_query($connect, "SELECT * FROM tblpesan WHERE keterangan='$kategori' ORDER BY tglPesan");
$i = 0;
while ($pesanan = mysqli_fetch_assoc($dataPesan)) {
  $i++;
  $idPrdPesan = $pesanan['idProduk'];
  $idClient = $pesanan['idClient'];
  $idPesan = $pesanan['id'];
  $tglpesan = $pesanan['tglPesan'];
  $textPesan = $pesanan['pesan'];
  $keterangan = $pesanan['keterangan'];
  $produk = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM tblproduk WHERE idProduk='$idPrdPesan'"));
  $NamaPrdPesan = $produk['namaProduk'];
  $jenisPrd = $produk['jenisProduk'];
  $thumb = $produk['cover'];
  $pelanggan = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM tblclient WHERE idClient='$idClient'"));
  $namaCLPesan = $pelanggan['namaClient'];

  echo '<tr>
          <td style="width:30px">'.$i.'</td>
          <td style="max-width:170px;width:20%">'.ucwords($namaCLPesan).'</td>
          <td><h6><img src="../assets/images/'.$jenisPrd.'/'.$thumb.'" width="30px">'.$NamaPrdPesan.'</h6></td>
          <td>
            <a href="../'.$folderadmin.'/?page=pesanan&kategori='.$kategori.'&id='.$idPesan.'&aksi=terima" class="btn btn-primary">Terima</a>
            <a href="../'.$folderadmin.'/?page=pesanan&kategori='.$kategori.'&id='.$idPesan.'&aksi=tolak" class="btn btn-warning">Tolak</a>
            <a href="../'.$folderadmin.'/?page=pesanan&kategori='.$kategori.'&id='.$idPesan.'&aksi=hapus" class="btn btn-danger">Hapus</a>
          </td>
        </tr>';
}
echo'
      </tbody>
    </table>
  </div>';
?>