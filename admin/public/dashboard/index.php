<?php
include "../../database/database.php";

// mencari total postingan, kategori, dan penulis
$totalPostingan = mysqli_query($conn, "SELECT * FROM postingan");
$totalKategori = mysqli_query($conn, "SELECT * FROM kategori");
$totalPenulis = mysqli_query($conn, "SELECT * FROM user");
$totalPost = mysqli_num_rows($totalPostingan);
$totalKat = mysqli_num_rows($totalKategori);
$totalPen = mysqli_num_rows($totalPenulis);

include "../menu/header.php";
$namaLengkap = $_SESSION['namaLengkap'];
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary font-weight-bolder"><i class="fas fa-fw fa-th-large"></i> Dashboard</h1>
    <a href="../../../home/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Halaman Utama Berita <i class="fas fa-arrow-right fa-sm text-white-50"></i></a>
  </div>
  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <a style="text-decoration: none;" href="../postingan/">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Total Postingan</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPost; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <a style="text-decoration: none;" href="../kategori/">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Total Kategori</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalKat; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clone fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <a style="text-decoration: none;" href="../penulis/">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Total Penulis/User</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPen; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-edit fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
      </div>
      </a>
    </div>
  </div>
  <!-- Content Row -->
  <div class="row text-center">

    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="site-heading">
                <!-- tampilan nama dengan menggunakan data dari session -->
                <h1 class="text-primary font-weight-bold" id="dashboard1">Halo, <?= $namaLengkap; ?></h1>
                <hr>
                <h1 id="dashboard2"> Selamat Datang </h1>
                <h1 id="dashboard3">
                  Di Dashboard Admin Simply News
                </h1>
                <span class="subheading"><a id="home2" href="terbaru.php" class="subheading text-light" style="text-decoration: none;"></a></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?php
include "../menu/footer.php";
?>