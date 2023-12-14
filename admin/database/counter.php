<?php
include "database.php";
// untuk mengambil informasi dari pengunjung
$ipaddress = $_SERVER['REMOTE_ADDR'] . "";
$tanggal = date('Y-m-d');
$kunjungan = 1;
$id_postingan = $_GET['id'];
// Daftarkan Kedalam Session Lalu Simpan Ke Database
if (!isset($_SESSION['counterdb'])) {
  $_SESSION['counterdb'] = $ipaddress;
  // jika id_postingan belum ada di database jalankan kodingan di bawah
  $query = mysqli_query($conn, "SELECT * FROM counterdb WHERE id_postingan='$id_postingan'");
  $row = mysqli_fetch_array($query);
  if (!$row) {
    mysqli_query($conn, "INSERT INTO counterdb (tanggal, ip_address, counter, id_postingan) VALUES ('" . $tanggal . "','" . $ipaddress . "','" . $kunjungan . "','" . $id_postingan . "')");
  } else {
    mysqli_query($conn, "UPDATE counterdb SET counter=counter+1 WHERE id_postingan='$id_postingan'");
  }
}
