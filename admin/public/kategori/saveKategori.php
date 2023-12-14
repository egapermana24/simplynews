<!-- mengambil data dari form lalu menyimpannya ke database -->
<?php
include "../../database/database.php";
$namaKategori = $_POST['kategori'];
$query = mysqli_query($conn, "INSERT INTO kategori VALUES ('','$namaKategori')");
if ($query) {
  echo "<script>alert('Data berhasil ditambahkan!');window.location.href='index.php';</script>";
} else {
  echo "<script>alert('Yah, Data gagal ditambahkan!');window.location.href='index.php';</script>";
}
