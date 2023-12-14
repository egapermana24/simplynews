<!-- ambil data dari halaman addPostingan -->
<?php
include "../../database/database.php";
// jika kategori atau penulis nilainya 0 maka akan diarahkan ke halaman addPostingan
// waktu negara indonesia
date_default_timezone_set('Asia/Jakarta');
// ambil data dari halaman addPostingan
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$kategori = $_POST['kategori'];
$tgl_posting = $_POST['tgl_posting'];
$penulis = $_POST['penulis'];
$waktu_posting = date("H:i:s");
if ($kategori == "0") {
  echo "<script>alert('Maaf, Kategori tidak boleh kosong!');window.location.href='addPostingan.php';</script>";
  die();
}

if ($penulis == "0") {
  echo "<script>alert('Maaf, Penulis tidak boleh kosong!');window.location.href='addPostingan.php';</script>";
  die();
}
// untuk mengeksekusi gambar
$nama_file = $_FILES['gambar']['name'];
// hilangkan character spesial
$nama_file = preg_replace("/[^A-Za-z0-9\_\-\.]/", '', $nama_file);
$nama_file = rand() . $nama_file;
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
// Set path folder tempat menyimpan gambarnya
$path = "../imagesBerita/" . $nama_file;
// jika folder belum ada maka akan membuat folder baru
if (!file_exists("imagesBerita")) {
  mkdir("imagesBerita", 0777, true);
}
// Proses upload
if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/webp") { // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  if ($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
    // Proses upload
    if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :
      // hilangkan character spesial sebelum masuk ke database
      $judul = mysqli_real_escape_string($conn, $judul);
      $isi = mysqli_real_escape_string($conn, $isi);
      $kategori = mysqli_real_escape_string($conn, $kategori);
      $penulis = mysqli_real_escape_string($conn, $penulis);
      // Proses simpan ke Database

      // netralkan tanda kutip satu dan tanda kutip dua yang ada di dalam string
      $query = "INSERT INTO postingan(judul, isi, gambar, tgl_posting, id_kategori, id_penulis, waktu_posting) VALUES('$judul', '$isi', '$nama_file', '$tgl_posting', '$kategori', '$penulis', '$waktu_posting')";
      $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
      if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
        echo "<script>alert('Data berhasil disimpan!');window.location.href='index.php';</script>";
      } else {
        // gunakan alert
        echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database!');window.location.href='addPostingan.php';</script>";
      }
    } else {
      // gunakan alert
      echo "<script>alert('Maaf, Gambar gagal untuk diupload!');window.location.href='addPostingan.php';</script>";
    }
  } else {
    // gunakan alert
    echo "<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB!');window.location.href='addPostingan.php';</script>";
  }
} else {
  // gunakan alert
  echo "<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG / WEBP!');window.location.href='addPostingan.php';</script>";
}
?>