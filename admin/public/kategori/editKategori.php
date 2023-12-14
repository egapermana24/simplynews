<?php
// mengambil data dari database untuk di edit berdasarkan id yang dikirim lewat url
include "../../database/database.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
$row = mysqli_fetch_array($query);

if (!$row) {
  header('Location: index.php');
  exit();
}
include "../menu/header.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary font-weight-bolder">Ubah Kategori</h1>
  </div>
  <div class="card shadow mb-4 col-8">
    <div class="card-body">
      <form method="post" action="changeKategori.php">
        <div class="form-group">
          <input type="hidden" name="id_kategori" value="<?= $row['id_kategori']; ?>">
          <label for="kategori">Kategori Berita</label>
          <input type="text" class="form-control" id="kategori" placeholder="Masukkan Kategori" name="kategori" required value="<?= $row['namaKategori']; ?>">
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