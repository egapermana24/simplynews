<?php
include "../menu/header.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="col-md-10 col-lg-8 col-xl-6">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-primary font-weight-bolder"><i class="far fa-fw fa-clone"></i> Kelola Kategori</h1>
      <a href="addKategori.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- ambil data dari database -->
              <?php
              include "../../database/database.php";
              $no = 1;
              $data = mysqli_query($conn, "SELECT * FROM kategori");
              while ($row = mysqli_fetch_array($data)) {
              ?>
                <tr>
                  <td class="text-center"><?= $no++; ?></td>
                  <td><?= $row['namaKategori']; ?></td>
                  <td class="text-center"><a href="<?= "editKategori.php?aksi=edit&&id=$row[id_kategori]"; ?>" class="badge bg-warning text-light"><i class="fas fa-edit"></i></a>&nbsp;<a href="<?= "deleteKategori.php?aksi=delete&&id=$row[id_kategori]"; ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="badge bg-danger text-light btn-hapus"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?php
include "../menu/footer.php";
?>