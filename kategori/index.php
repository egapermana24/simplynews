<?php
$id = $_GET['id'];
include "../admin/database/database.php";
$query = mysqli_query($conn, "SELECT * FROM kategori 
                              INNER JOIN postingan ON kategori.id_kategori = postingan.id_kategori 
                              INNER JOIN user ON postingan.id_penulis = user.id_user 
                              WHERE kategori.id_kategori = '$id'");
$row = mysqli_fetch_array($query);

// jika id tidak ada di database maka redirect
if (!$row) {
  header('Location: ../home/');
  exit();
}

include "../menu/header.php";
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('../menu/src/assets/img/koran.webp'); background-attachment: fixed;">
  <div class="container position-relative px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="site-heading">
          <h1 id="terbaru"><?= $row['namaKategori']; ?></h1>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
  <h1 class="text-primary">Tentang <?= $row['namaKategori']; ?></h1>
  <!-- Divider-->
  <hr class="my-10" />
  <div class="row gx-4 gx-lg-5 justify-content-center mt-4 mb-4">
    <!-- tampilkan datanya di dalam class col -->
    <?php
    $query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori = kategori.id_kategori INNER JOIN user ON postingan.id_penulis = user.id_user WHERE kategori.id_kategori = $id ORDER BY kategori.id_kategori ASC");

    while ($row = mysqli_fetch_array($query)) {
      $judul = $row['judul'];
      $judul_terpotong = (strlen($judul) > 20) ? substr($judul, 0, 47) . '...' : $judul;
      // Tampilkan postingan dari kategori tertentu
    ?>
      <div class="col-md-10 col-lg-6 col-xl-4">
        <!-- Post preview-->
        <div class="post-preview">
          <div class="row mt-3">
            <div class="col">
              <img class="rounded mx-auto d-block mb-3" width="100%" src="../admin/public/imagesBerita/<?= $row['gambar']; ?>" class="img-fluid" alt="...">
            </div>
          </div>
          <a href="<?= "/simplynews/read/index.php?aksi=show&&id=$row[id_postingan]"; ?>">
            <h3 class="post-subtitle">
              <?= $judul_terpotong; ?>
            </h3>
          </a>
          <p class="post-meta" style="font-size: 12px;">
            Di Posting oleh
            <a href="#!"><?= $row['namaLengkap']; ?></a>
            pada <?= date('d F Y', strtotime($row['tgl_posting'])); ?>
          </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
      </div>
    <?php
    }
    ?>
  </div>
</div>

<?php
include "../menu/footer.php";

?>