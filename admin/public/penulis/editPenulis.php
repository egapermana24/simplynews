<?php
// mengambil data dari database untuk di edit berdasarkan id yang dikirim lewat url
include "../../database/database.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
$row = mysqli_fetch_array($query);

if (!$row) {
  header('Location: index.php');
  exit();
}
include "../menu/header.php";

if ($_SESSION['level'] != "admin" || !$row) {
  if ($row) {
    // halaman ini hanya bisa diakses jika yang login adalah penulis yang bersangkutan
    if ($_SESSION['namaLengkap'] != $row['namaLengkap']) {
      echo "<script>alert('Anda tidak memiliki akses ke halaman ini!');window.location.href='index.php';</script>";
      die();
    }
  } else {
    header('Location: index.php');
    exit();
  }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary font-weight-bolder">Ubah Data Penulis</h1>
  </div>
  <div class="card shadow mb-4 col-8">
    <div class="card-body">
      <form method="post" action="changePenulis.php">
        <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
        <div class="form-group">
          <label for="namaLengkap">Nama Lengkap</label>
          <input type="text" class="form-control" id="namaLengkap" placeholder="Masukkan Nama Lengkap" name="namaLengkap" value="<?= $row['namaLengkap']; ?>" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" value="<?= $row['username']; ?>" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
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