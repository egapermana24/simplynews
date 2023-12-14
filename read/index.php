<?php
session_start();
include "../admin/database/counter.php";
// hancurkan session
session_destroy();

$id = $_GET['id'];
include "../admin/database/database.php";
$query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user WHERE id_postingan='$id'");
$row = mysqli_fetch_array($query);

if (!$row) {
  header('Location: ../home/');
  exit();
}

include "../menu/header.php";

?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('../admin/public/imagesBerita/<?= $row['gambar']; ?>')">
  <div class="container position-relative px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="site-heading py-5 my-3">
          <h1></h1>
          <span class="subheading"><a id="home2" href="terbaru.php" class="subheading text-light" style="text-decoration: none;"></a></span>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Post Content-->
<article class="mb-4">
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-10">
        <img class="rounded mx-auto d-block" width="100%" src="../admin/public/imagesBerita/<?= $row['gambar']; ?>" class="img-fluid" alt="...">
        <div class="post-heading mt-3">
          <h1><?= $row['judul']; ?></h1>
          <span class="meta" style="font-size: 15px;">
            Di Posting oleh
            <a href="#!"><?= $row['namaLengkap']; ?></a>
            pada <?= date('d F Y', strtotime($row['tgl_posting'])); ?> | <a href="<?= "/simplynews/kategori/index.php?aksi=show&&id=$row[id_kategori]"; ?>"><?= $row['namaKategori']; ?></a>
          </span>
        </div>
        <hr>
        <div class="mt-5">
          <?= $row['isi']; ?>
        </div>
      </div>
    </div>
  </div>
</article>

<?php
include "../menu/footer.php";
?>