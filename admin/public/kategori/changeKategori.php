<!-- ambil data dari form edit lalu masukan ke database -->
<?php
include "../../database/database.php";

$id = $_POST['id_kategori'];
$kategori = $_POST['kategori'];

$query = mysqli_query($conn, "UPDATE kategori SET namaKategori='$kategori' WHERE id_kategori='$id'");
if ($query) {
  echo "<script>alert('Data berhasil diubah!');window.location.href='index.php';</script>";
} else {
  echo "<script>alert('Yah, Data gagal diubah!');window.location.href='index.php';</script>";
}
