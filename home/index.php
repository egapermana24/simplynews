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
          <h1 id="home"></h1>
          <span class="subheading"><a id="home2" href="../terbaru/" class="subheading text-light" style="text-decoration: none;"></a></span>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
  <h1 class="text-primary">Berita Utama</h1>
  <!-- Divider-->
  <hr class="my-10" />
  <div class="row gx-4 gx-lg-5 justify-content-center mt-4 mb-4">
    <!-- tampilkan datanya di dalam class col -->
    <?php
    $query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user ORDER BY kategori.id_kategori ASC LIMIT 3");
    while ($row = mysqli_fetch_array($query)) {
      $judul = $row['judul'];
      $judul_terpotong = (strlen($judul) > 20) ? substr($judul, 0, 47) . '...' : $judul;
    ?>
      <div class="col-md-10 col-lg-6 col-xl-4">
        <!-- Post preview-->
        <div class="post-preview">
          <div class="row mt-3">
            <div class="col">
              <img class="rounded mx-auto d-block mb-3" width="100%" src="../admin/public/imagesBerita/<?= $row['gambar']; ?>" class="img-fluid" alt="...">
            </div>
          </div>
          <a id="klik" href="<?= "/simplynews/read/index.php?aksi=show&&id=$row[id_postingan]"; ?>">
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
        <!-- Pager-->
        <div class="d-flex justify-content-between mb-4">
          <a class="btn btn-primary text-uppercase col-12" href="<?= "/simplynews/read/index.php?aksi=show&&id=$row[id_postingan]"; ?>">Selengkapnya →</a>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
      </div>
    <?php
    }
    ?>
  </div>
  <h1 class="text-primary">Terbaru</h1>
  <!-- Divider-->
  <hr class="my-2" />
  <div class="row gx-4 gx-lg-5 justify-content-center mt-4">
    <!-- tampilkan datanya di dalam class col urutkan dari yang terbaru -->
    <?php
    $query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user ORDER BY id_postingan DESC LIMIT 6");
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
  <h1 class="text-primary">Mungkin Anda Suka</h1>
  <!-- Divider-->
  <hr class="my-2" />
  <div class="row gx-4 gx-lg-5 justify-content-center mt-4">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user ORDER BY waktu_posting DESC LIMIT 6");
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
<div class="container mb-5">
  <div class="row gx-4 gx-lg-5 justify-content-center mt-4">
    <div class="col-md-12 col-lg-8 col-xl-6 mt-md-3">
      <h1 class="text-primary">Kategori Berita</h1>
      <!-- Divider-->
      <hr class="my-10" />
      <div class="row gx-4 gx-lg-5 justify-content-center mt-4">
        <div class="col-md-10 col-lg-12 col-xl-12">
          <div class="list-group">
            <!-- tampilkan data kategori urutkan secara ascending -->
            <?php
            $query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori ORDER BY judul ASC LIMIT 3");
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <a href="<?= "/simplynews/kategori/index.php?aksi=show&&id=$row[id_kategori]"; ?>" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1 text-primary"><?= $row['namaKategori']; ?></h5> <!-- Use the $namaKategori variable here -->
                  <small class="text-primary" style="font-size: 12px;">Ketuk Untuk Lihat</small>
                </div>
                <p class="mb-1"><?= $row['judul']; ?></p>
              </a>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-8 col-xl-6 mt-3">
      <h1 class="text-primary">Sedang Populer</h1>
      <!-- Divider-->
      <hr class="my-10" />
      <div class="row gx-4 gx-lg-5 justify-content-center mt-4">
        <div class="col-md-12 col-lg-12 col-xl-12">
          <ul class="list-group list-group-flush">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN counterdb ON postingan.id_postingan=counterdb.id_postingan ORDER BY counter DESC LIMIT 10");
            $no = 1;
            while ($row = mysqli_fetch_array($query)) {
              $judul = $row['judul'];
              $judul_terpotong = (strlen($judul) > 20) ? substr($judul, 0, 40) . '...' : $judul;
            ?>
              <li class="list-group-item d-flex justify-content-between align-items-center post-preview">
                <a href="<?= "/simplynews/read/index.php?aksi=show&&id=$row[id_postingan]"; ?>">
                  <?= $judul_terpotong; ?>
                </a>
                <span class="badge badge-secondary badge-pill"><?= $no++; ?></span>
              </li>
            <?php } ?>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<?php
include "../menu/footer.php";

?>