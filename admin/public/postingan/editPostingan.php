<?php
include "../../database/database.php";
include "../menu/header.php";
$id = $_GET['id'];
// join tabel postingan dengan tabel kategori dan tabel user
$query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user WHERE id_postingan='$id'");
$row = mysqli_fetch_array($query);


$kategori = mysqli_query($conn, "SELECT * FROM kategori");
$penulis = mysqli_query($conn, "SELECT * FROM user");

if ($_SESSION['level'] != "admin") {
  if (!$row || $_SESSION['id_user'] != $row['id_user']) {
    // gunakan window.location untuk redirect tanpa alert
    echo "<script language='JavaScript'>
    window.location.href='index.php';
    </script>";
    exit();
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary font-weight-bolder">Ubah Postingan</h1>
  </div>
  <div class="card shadow mb-4 col-lg-9 col-xl-9 col-md-12">
    <div class="card-body">
      <form method="post" action="changePostingan.php" enctype="multipart/form-data">
        <input type="hidden" name="id_postingan" value="<?= $row['id_postingan']; ?>">
        <div class="form-group">
          <label for="judul">Judul Berita</label>
          <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul Berita" name="judul" value="<?= $row['judul']; ?>" required>
        </div>
        <div class="form-group">
          <label for="isi">Isi Berita</label>
          <input id="isi" type="hidden" name="isi">
          <trix-editor input="isi"><?= $row['isi']; ?></trix-editor>
        </div>
        <div class="form-group">
          <label for="isi">Kategori Berita</label>
          <select class="custom-select" name="kategori" required>
            <option value="<?= $row['id_kategori']; ?>" hidden selected><?= $row['namaKategori']; ?></option>
            <?php while ($kat = mysqli_fetch_array($kategori)) { ?>
              <option value="<?= $kat['id_kategori']; ?>"><?= $kat['namaKategori']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <div class="row">
            <div class="col-6 mb-3 text-center">
              <img class="img-thumbnail" src="../imagesBerita/<?= $row['gambar']; ?>" style="height: 200px;" />
              <small class="form-text text-muted">Gambar Lama</small>
            </div>
            <div class="col-6 mb-3 text-center">
              <img class="img-thumbnail mx-auto d-none" id="uploadGambar" style="height: 200px;" />
              <small class="form-text text-muted d-none" id="textUploadGambar">Gambar Baru</small>
            </div>
          </div>
          <div class="custom-file">
            <input type="hidden" value="<?= $row['gambar']; ?>" name="gambarLama">
            <input class="custom-file-input" name="gambar" type="file" id="fileInput" onchange="handleFileUpload(event)">
            <label class="custom-file-label" for="inputGroupFile01" id="namaFile">Pilih Jika Ingin Mengganti Gambar</label>
          </div>
        </div>
        <div class="form-group ">
          <label for="tanggal">Tanggal Posting</label>
          <input type="date" class="form-control" id="tanggal" name="tgl_posting" value="<?= $row['tgl_posting']; ?>" required>
        </div>
        <div class="form-group">
          <label for="isi">Penulis</label>
          <select class="custom-select" name="penulis" required>
            <option value="<?= $row['id_user']; ?>" hidden selected><?= $row['namaLengkap']; ?></option>
            <?php while ($pen = mysqli_fetch_array($penulis)) { ?>
              <option value="<?= $pen['id_user']; ?>"><?= $pen['namaLengkap']; ?></option>
            <?php } ?>
          </select>
        </div>
        <a href="index.php"><button type="button" class="btn btn-secondary mt-3">Kembali</button></a>
        <button type="submit" class="btn btn-primary mt-3">Ubah</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?php
include "../menu/footer.php";
?>