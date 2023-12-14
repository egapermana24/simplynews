<!-- ambil data dari form lalu simpan ke database -->
<?php
include "../../database/database.php";

$namaLengkap = $_POST['namaLengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
// agar tidak tampil warning
$level = isset($_POST['level']) ? $_POST['level'] : null;

// lakukan konfirmasi password

// username tidak boleh memiliki spasi dan harus huruf kecil semua 
$username = strtolower(str_replace(" ", "", $username));
if ($password != $passwordConfirm) {
  echo "<script>alert('Password tidak sama!');window.location.href='addPenulis.php';</script>";
} else {
  // lakukan pengecekan apakah username sudah ada didalam database
  $cek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
  if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Username sudah ada!');window.location.href='addPenulis.php';</script>";
  } else {
    // lakukan enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = mysqli_query($conn, "INSERT INTO user VALUES('', '$namaLengkap', '$username', '$password', '$level')");
    if ($query) {
      echo "<script>alert('Data berhasil ditambahkan!');window.location.href='index.php';</script>";
    } else {
      echo "<script>alert('Yah, Data gagal ditambahkan!');window.location.href='index.php';</script>";
    }
  }
}
