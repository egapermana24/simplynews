<?php
include "../../database/database.php";
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
$penulis = mysqli_query($conn, "SELECT * FROM user");


include "../menu/header.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary font-weight-bolder">Tambah Postingan</h1>
  </div>
  <div class="card shadow mb-4 col-lg-9 col-xl-9 col-md-12">
    <div class="card-body">
      <form method="post" action="savePostingan.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="judul">Judul Berita</label>
          <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul Berita" name="judul" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
          <label for="isi">Isi Berita</label>
          <input id="isi" type="hidden" name="isi">
          <trix-editor input="isi"></trix-editor>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
          <label for="isi">Kategori Berita</label>
          <select class="custom-select" name="kategori" required>
            <option value="0" selected hidden>:: Pilih Kategori ::</option>
            <?php while ($kat = mysqli_fetch_array($kategori)) { ?>
              <option value="<?= $kat['id_kategori']; ?>"><?= $kat['namaKategori']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <img class="img-thumbnail mb-3 d-none" id="uploadGambar" style="height: 200px;" />
          <div class="custom-file">
            <input class="custom-file-input" name="gambar" type="file" id="fileInput" onchange="handleFileUpload(event)">
            <label class="custom-file-label" for="inputGroupFile01" id="namaFile">Pilih Gambar</label>
          </div>
        </div>

        <!-- tanggal posting -->
        <div class="form-group ">
          <label for="tanggal">Tanggal Posting</label>
          <input type="date" class="form-control" id="tanggal" name="tgl_posting" required>
        </div>
        <div class="form-group">
          <label for="isi">Penulis</label>
          <select class="custom-select" name="penulis" required>
            <!-- pilihkan sesuai id_user yang sedang login -->
            <?php
            if ($_SESSION['level'] == "admin") {
            ?>
              <option value="0" selected hidden>:: Pilih Penulis ::</option>
              <?php
              while ($pen = mysqli_fetch_array($penulis)) {
              ?>
                <option value="<?= $pen['id_user']; ?>"><?= $pen['namaLengkap']; ?></option>
              <?php } ?>
            <?php } else { ?>
              <option value="<?= $_SESSION['id_user']; ?>" selected><?= $_SESSION['namaLengkap']; ?></option>
            <?php } ?>
          </select>
        </div>
        <a href="index.php"><button type="button" class="btn btn-secondary mt-3">Kembali</button></a>
        <button type="submit" class="btn btn-primary mt-3">Posting</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?php
include "../menu/footer.php";
?>