<?php
$namaLengkap = $_SESSION['namaLengkap'];
?>
<style>
  /* Ganti warna ikon menjadi putih ketika dihover */
  .icon-hover:hover {
    color: white;
  }
</style>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-gradient-white topbar mb-4 static-top shadow">
  <!-- Topbar Search -->
  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="../../public/postingan/index.php">
    <?php
    if ($_SERVER['REQUEST_URI'] == "/simplynews/admin/public/postingan/" || $_SERVER['REQUEST_URI'] == "/simplynews/admin/public/postingan/index.php") {
    ?>
      <div class="input-group">
      <?php
    } else {
      ?>
        <div class="input-group d-none">
        <?php
      }
        ?>
        <input type="text" class="form-control bg-white border-0 small" placeholder="Cari : [Judul/Penulis/Kategori]" name="search" aria-describedby="basic-addon2" />
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
        <div class="input-group-append">
          <a href="../../public/postingan/" class="btn outline-primary">
            <span class="icon text-primary">
              <i class="fas fa-sync-alt"></i>
            </span>
          </a>
        </div>
        </div>
  </form>
  <ul class="navbar-nav ml-auto">
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold"><?= $namaLengkap; ?></span>
        <img class="img-profile rounded-circle" src="../../../template/img/profile.png" />
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="/simplynews/admin/public/penulis/">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Penulis
        </a>
        <div class="dropdown-divider"></div>
        <form action="/simplynews/admin/public/login/validasiLogin.php?aksi=logout" method="post" id="logout">
          <button class="dropdown-item" type="submit" style="border: none; cursor: pointer;" onclick="javascript: return confirm('Apakah Anda yakin ingin Keluar?')">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </button>
        </form>
      </div>

    </li>
  </ul>
</nav>
<!-- End of Topbar -->