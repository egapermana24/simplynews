<!-- tampilkan postingan berdasarkan id yang dipilih, buat tampilannya dengan bootstrap -->
<?php
include "../menu/header.php";

$id = $_GET['id'];
include "../../database/database.php";
$query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user WHERE postingan.id_postingan='$id'");
$row = mysqli_fetch_array($query);

$kunjungan = mysqli_query($conn, "SELECT * FROM counterdb WHERE id_postingan='$id'");
$counter = mysqli_fetch_array($kunjungan);
if (!$counter) {
  $counter = 0;
} else {
  $counter = $counter['counter'];
  $counter = $counter;
}

if (!$row) {
  echo "<script language='JavaScript'>
  window.location.href='index.php';
  </script>";
  exit();
}


?>
<!-- Begin Page Content -->

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="h3 mb-0 text-primary font-weight-bolder">Detail Postingan</h1>
    <a href="index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
  </div>
  <div class="card shadow mb-4 col-lg-9 col-xl-9 col-md-12">
    <div class="card-body">
      <div class="row mt-3">
        <div class="col">
          <img src="../imagesBerita/<?= $row['gambar']; ?>" class="img-fluid img-thumbnail" alt="Responsive image">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <h3 class="font-weight-bolder"><?= $row['judul']; ?></h3>
          <p>Untuk Kategori : <?= $row['namaKategori']; ?></p>
          <p>Diposting oleh : <?= $row['namaLengkap']; ?></p>
          <p>Pada tanggal <?= date('d-m-Y', strtotime($row['tgl_posting'])); ?>, Pukul <?= $row['waktu_posting']; ?></p>
          <p>Dilihat sebanyak <?= $counter; ?> kali</p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <p><?= $row['isi']; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?php
include "../menu/footer.php";
?>