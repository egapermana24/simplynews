<!-- ambil aksi dan id yang dikirim lalu delete dari database -->
<?php
include "../../database/database.php";
$aksi = $_GET['aksi'];
$id = $_GET['id'];
if ($aksi == "delete") {
  $query = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori='$id'");
  if ($query) {
    // cek jika id masih ada didalam database berarti gagal dihapus
    $cek = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
    if (mysqli_num_rows($cek) > 0) {
      echo "<script>alert('Yah, Data gagal dihapus!');window.location.href='index.php';</script>";
    } else {
      echo "<script>alert('Data berhasil dihapus!');window.location.href='index.php';</script>";
    }
  } else {
    echo "<script>alert('Yah, Data gagal dihapus!');window.location.href='index.php';</script>";
  }
}
