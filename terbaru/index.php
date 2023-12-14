<?php
include "../admin/database/database.php";

include "../menu/header.php";
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('../menu/src/assets/img/koran.webp'); background-attachment: fixed;">
  <div class="container position-relative px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="site-heading">
          <h1 id="terbaru">Terbaru</h1>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
  <h1 class="text-primary">Terbaru</h1>
  <!-- Divider-->
  <hr class="my-2" />
  <div class="row gx-4 gx-lg-5 justify-content-center mt-4">
    <!-- tampilkan datanya di dalam class col urutkan dari yang terbaru -->
    <?php
    $query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user ORDER BY waktu_posting ASC LIMIT 9");
    while ($row = mysqli_fetch_array($query)) {
      $judul = $row['judul'];
      $judul_terpotong = (strlen($judul) > 20) ? substr($judul, 0, 47) . '...' : $judul;
    ?>
      <div class="col-md-10 col-lg-6 col-xl-4">
        <!-- Post preview-->
        <div class="post-preview">
          <a href="<?= "/simplynews/read/index.php?aksi=show&&id=$row[id_postingan]"; ?>">
            <!-- <h2 class="post-title">
            Man must explore, and this is exploration at its greatest
          </h2> -->
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
    <?php } ?>
  </div>
  <h1 class="text-primary">Lainnya</h1>
  <!-- Divider-->
  <hr class="my-2" />
  <div class="row gx-4 gx-lg-5 justify-content-center mt-4 mb-5">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user ORDER BY waktu_posting DESC LIMIT 3");
    while ($row = mysqli_fetch_array($query)) {
      $judul = $row['judul'];
      $judul_terpotong = (strlen($judul) > 20) ? substr($judul, 0, 47) . '...' : $judul;
    ?>
      <div class="col-md-10 col-lg-6 col-xl-4 mt-3">
        <!-- Post preview-->
        <div class="card post-preview">
          <a href="<?= "/simplynews/read/index.php?aksi=show&&id=$row[id_postingan]"; ?>">
            <img src="../admin/public/imagesBerita/<?= $row['gambar']; ?>" height="160" class="card-img-top" alt="images">
            <h5 class="card-body post-subtitle">
              <?= $judul_terpotong; ?>
            </h5>
          </a>
          <p class="card-body post-meta" style="font-size: 12px;">
            Di Posting oleh
            <a href="#!"><?= $row['namaLengkap']; ?></a>
            pada <?= date('d F Y', strtotime($row['tgl_posting'])); ?>
          </p>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</div>

<?php
include "../menu/footer.php";
?>