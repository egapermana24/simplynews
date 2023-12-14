<?php
include "../menu/header.php";
if ($_SESSION['level'] != "admin") {
  echo "<script language='JavaScript'>
  window.location.href='index.php';
  </script>";
}
// hanya bisa diakses oleh admin


?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary font-weight-bolder">Tambah Penulis</h1>
  </div>
  <div class="card shadow mb-4 col-8">
    <div class="card-body">
      <form method="post" action="savePenulis.php">
        <div class="form-group">
          <label for="namaLengkap">Nama Lengkap</label>
          <input type="text" class="form-control" id="namaLengkap" placeholder="Masukkan Nama Lengkap" name="namaLengkap" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
          <label for="passwordConfirm">Konfirmasi Password</label>
          <input type="password" class="form-control" id="passwordConfirm" placeholder="Masukkan Konfirmasi Password" name="passwordConfirm" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="admin" id="defaultCheck1" name="level">
          <label class="form-check-label" for="defaultCheck1">
            Sebagai Admin
          </label>
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