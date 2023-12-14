<!-- ambil data dari form edit lalu update datanya ke database -->
<?php
include "../../database/database.php";
$id = $_POST['id_postingan'];
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$isi = $_POST['isi'];
$penulis = $_POST['penulis'];
$tgl_posting = $_POST['tgl_posting'];
$gambar = $_FILES['gambar']['name'];
$gambarLama = $_POST['gambarLama'];
// cek kondisi pada gambar apakah gmbar diganti atau tidak
if ($gambar == "") {
  $judul = mysqli_real_escape_string($conn, $judul);
  $isi = mysqli_real_escape_string($conn, $isi);
  $kategori = mysqli_real_escape_string($conn, $kategori);
  $penulis = mysqli_real_escape_string($conn, $penulis);
  $query = mysqli_query($conn, "UPDATE postingan SET judul='$judul', tgl_posting='$tgl_posting', id_kategori='$kategori', isi='$isi', id_penulis='$penulis' WHERE id_postingan='$id'");
  if ($query) {
    echo "<script>alert('Data berhasil diubah!');window.location.href='index.php';</script>";
  } else {
    echo "<script>alert('Yah, Data gagal diubah!');window.location.href='index.php';</script>";
  }
} else {
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
        $query = "UPDATE postingan SET judul='$judul', tgl_posting='$tgl_posting', id_kategori='$kategori', isi='$isi', id_penulis='$penulis', gambar='$nama_file' WHERE id_postingan='$id'";
        $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
        if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
          // Jika Sukses, Lakukan :
          // hapus gambar lama
          unlink("../imagesBerita/" . $gambarLama);
          echo "<script>alert('Data berhasil diubah!');window.location.href='index.php';</script>";
        } else {
          // gunakan alert lalu kembali ke addPostingan

        }
      } else {
        echo "<script>alert('Gambar gagal diupload!');window.location.href='index.php';</script>";
      }
    } else {
      echo "<script>alert('Ukuran gambar tidak boleh lebih dari 1MB!');window.location.href='index.php';</script>";
    }
  } else {
    echo "<script>alert('Tipe gambar yang diupload harus JPG / JPEG / PNG / WEBP!');window.location.href='index.php';</script>";
  }
}
