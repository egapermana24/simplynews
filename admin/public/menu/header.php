<?php
include "../../database/database.php";
session_start();
// jika tidak ada session maka diharuskan login dulu
if (!isset($_SESSION['username'])) {
  echo "<script>alert('Anda harus login terlebih dahulu!');window.location.href='../../../login/';</script>";
  die();
} else {
  $username = $_SESSION['username'];
  $namaLengkap = $_SESSION['namaLengkap'];
  $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
  $row = mysqli_fetch_array($query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Simply News - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="../../../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <!-- <link href="template/css/sb-admin-2.min.css" rel="stylesheet" /> -->
  <link rel="icon" href="../../../template/img/tab.png" type="image/x-icon">
  <link href="../../../template/css/sb-admin-2.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }

    /* Ganti warna ikon menjadi putih ketika dihover */
    .icon-hover:hover {
      color: white;
    }
  </style>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- posisi header -->
    <!-- posisi sidebar -->
    <?php
    include "sidebar.php";
    ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">

        <!-- posisi topbar -->
        <?php
        include "topbar.php";
        ?>