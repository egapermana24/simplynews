<?php
include "../../database/database.php";

$id = $_POST['id_user'];
$namaLengkap = $_POST['namaLengkap'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
$row = mysqli_fetch_array($query);

$hashedPassword = $row['password']; // Password di-hash yang ada di database

if (password_verify($password, $hashedPassword)) {
  $query = mysqli_query($conn, "UPDATE user SET namaLengkap='$namaLengkap', username='$username' WHERE id_user='$id'");
  if ($query) {
    echo "<script>alert('Data berhasil diubah!');window.location.href='index.php';</script>";
  } else {
    echo "<script>alert('Yah, Data gagal diubah!');window.location.href='index.php';</script>";
  }
} else {
  echo "<script>alert('Password yang kamu input salah!');window.location.href='index.php';</script>";
}
