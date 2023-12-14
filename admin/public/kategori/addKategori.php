<?php
include "../menu/header.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary font-weight-bolder">Tambah Kategori</h1>
  </div>
  <div class="card shadow mb-4 col-8">
    <div class="card-body">
      <form method="post" action="saveKategori.php">
        <div class="form-group">
          <label for="kategori">Kategori Berita</label>
          <input type="text" class="form-control" id="kategori" placeholder="Masukkan Kategori" name="kategori" autofocus required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <a href="index.php"><button type="button" class="btn btn-secondary mt-3">Kembali</button></a>
        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?php
include "../menu/footer.php";
?>