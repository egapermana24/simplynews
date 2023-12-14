<?php
include "../menu/header.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="col-md-10 col-lg-8 col-xl-6">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-primary font-weight-bolder"><i class="fas fa-fw fa-user-edit"></i> Penulis</h1>
      <?php
      // jika yang login bukan admin maka hilangkan tombol tambah penulis
      if ($_SESSION['level'] == "admin") {
      ?>
        <a href="addPenulis.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Penulis</a>
      <?php } ?>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penulis</h6>
      </div>
      <div class="card-body">
        <ul class="list-group">
          <!-- ambil data dari database -->
          <?php
          include "../../database/database.php";
          $no = 1;
          $data = mysqli_query($conn, "SELECT * FROM user");
          while ($row = mysqli_fetch_array($data)) {
          ?>
            <!-- hanya bisa di edit jika nama yang tampil sama dengan seasson -->
            <li class="list-group-item"><?= $row['namaLengkap']; ?>
              <?php if ($row['namaLengkap'] == $_SESSION['namaLengkap'] || $_SESSION['level'] == "admin") { ?>
                <a class="float-right" href="<?= "editPenulis.php?aksi=edit&&id=$row[id_user]"; ?>" class="badge bg-warning text-light"><i class="fas fa-edit"></i></a>
              <?php } ?>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?php
include "../menu/footer.php";
?>