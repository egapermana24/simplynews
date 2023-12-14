<!-- ambil aksi dan id yang dikirim lalu delete dari database -->
<?php
include "../../database/database.php";
$aksi = $_GET['aksi'];
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user WHERE id_postingan='$id'");
$row = mysqli_fetch_array($query);
session_start();
if ($_SESSION['level'] != "admin") {
  if (!$row || $_SESSION['id_user'] != $row['id_user']) {
    // gunakan window.location untuk redirect tanpa alert
    echo "<script language='JavaScript'>
    window.location.href='index.php';
    </script>";
    exit();
  }
}
if ($aksi == "delete") {
  $query = mysqli_query($conn, "DELETE FROM postingan WHERE id_postingan='$id'");
  if ($query) {
    // cek jika id masih ada didalam database berarti gagal dihapus
    $cek = mysqli_query($conn, "SELECT * FROM postingan WHERE id_postingan='$id'");
    if (mysqli_num_rows($cek) > 0) {
      echo "<script>alert('Yah, Data gagal dihapus!');window.location.href='index.php';</script>";
    } else {
      echo "<script>alert('Data berhasil dihapus!');window.location.href='index.php';</script>";
    }
  } else {
    echo "<script>alert('Yah, Data gagal dihapus!');window.location.href='index.php';</script>";
  }
}
