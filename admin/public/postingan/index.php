<?php
include "../menu/header.php";
include "../../database/database.php";
$query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user ORDER BY postingan.id_postingan DESC");
$row = mysqli_fetch_array($query);

include "../../database/database.php";
// buat fitur search cari berdasarkan judul, kategori, dan penulis
if (isset($_POST['search'])) {
  $search = $_POST['search'];
  $query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user WHERE judul LIKE '%$search%' OR namaKategori LIKE '%$search%' OR namaLengkap LIKE '%$search%' ORDER BY postingan.id_postingan DESC");
} else {
  $query = mysqli_query($conn, "SELECT * FROM postingan INNER JOIN kategori ON postingan.id_kategori=kategori.id_kategori INNER JOIN user ON postingan.id_penulis=user.id_user ORDER BY postingan.id_postingan DESC");
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-primary font-weight-bolder"><i class="far fa-fw fa-newspaper"></i> Kelola Postingan</h1>
    <a href="addPostingan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Postingan</a>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Postingan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>No</th>
              <th>Gambar</th>
              <th>Judul</th>
              <!-- <th width="100px">Dilihat</th> -->
              <th>Kategori</th>
              <th>Tanggal Posting</th>
              <th>Waktu Posting</th>
              <th>Penulis</th>
              <th width="120px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- ambil data dari database -->
            <?php
            include "../../database/database.php";
            $no = 1;
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?= $no++; ?></td>
                <td class="text-center"><img class="img-thumbnail" src="../imagesBerita/<?= $row['gambar']; ?>" style="width: 300px;"></td>
                <td><?= $row['judul']; ?></td>
                <td><?= $row['namaKategori']; ?></td>
                <td><?= date('d/m/Y', strtotime($row['tgl_posting'])); ?></td>
                <td><?= $row['waktu_posting']; ?></td>
                <td><?= $row['namaLengkap']; ?></td>
                <td class="text-center">
                  <a href="<?= "showPostingan.php?aksi=show&&id=$row[id_postingan]"; ?>" class="badge bg-primary text-light"><i class="fas fa-info-circle"></i></a>
                  <?php
                  // yang bisa mengedit dan menghapus hanya si penulis yang bersangkutan
                  if ($_SESSION['id_user'] == $row['id_user'] || $_SESSION['level'] == 'admin') {
                  ?>
                    &nbsp;<a href="<?= "editPostingan.php?aksi=edit&&id=$row[id_postingan]"; ?>" class="badge bg-warning text-light"><i class="fas fa-edit"></i></a>&nbsp;<a href="<?= "deletePostingan.php?aksi=delete&&id=$row[id_postingan]"; ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="badge bg-danger text-light btn-hapus"><i class="fas fa-trash"></i></a>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- proses -->

<?php
include "../menu/footer.php";
?>