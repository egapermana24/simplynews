<!-- Sidebar -->
<ul class="navbar-nav bg-gradient sidebar sidebar-light shadow-lg" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/">
    <div class="sidebar-brand-icon">
      <img src="../../../template/img/title.png" alt="">
    </div>
    <div class="sidebar-brand-text mx-3 text-primary">Simply News</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0" />

  <!-- Menu Dashboard -->
  <?php
  if ($_SERVER['REQUEST_URI'] == "/simplynews/admin/public/dashboard/" || $_SERVER['REQUEST_URI'] == "/simplynews/admin/public/dashboard/index.php") {
  ?>
    <li class="nav-item active">
      <a class="nav-link text-primary" href="/simplynews/admin/public/dashboard/">
      <?php
    } else {
      ?>
    <li class="nav-item">
      <a class="nav-link text-secondary" href="/simplynews/admin/public/dashboard/">
      <?php
    }
      ?>
      <i class="fas fa-fw fa-th-large"></i>
      <span>Dashboard</span></a>
    </li>

    <!-- Menu Postingan -->
    <?php
    if ($_SERVER['REQUEST_URI'] == "/simplynews/admin/public/postingan/" || $_SERVER['REQUEST_URI'] == "/simplynews/admin/public/postingan/index.php") {
    ?>
      <li class="nav-item active">
        <a class="nav-link text-primary" href="/simplynews/admin/public/postingan/">
        <?php
      } else {
        ?>
      <li class="nav-item">
        <a class="nav-link text-secondary" href="/simplynews/admin/public/postingan/">
        <?php
      }
        ?>
        <i class="far fa-fw fa-newspaper"></i>
        <span>Kelola Postingan</span></a>
      </li>

      <!-- Menu kategori -->
      <?php
      if ($_SERVER['REQUEST_URI'] == "/simplynews/admin/public/kategori/" || $_SERVER['REQUEST_URI'] == "/simplynews/admin/public/kategori/index.php") {
      ?>
        <li class="nav-item active">
          <a class="nav-link text-primary" href="/simplynews/admin/public/kategori/">
          <?php
        } else {
          ?>
        <li class="nav-item">
          <a class="nav-link text-secondary" href="/simplynews/admin/public/kategori/">
          <?php
        }
          ?>
          <i class="far fa-fw fa-clone"></i>
          <span>Kelola Kategori</span></a>
        </li>

        <!-- Menu Penulis -->
        <?php
        if ($_SERVER['REQUEST_URI'] == "/simplynews/admin/public/penulis/"  || $_SERVER['REQUEST_URI'] == "/simplynews/admin/public/penulis/index.php") {
        ?>
          <li class="nav-item active">
            <a class="nav-link text-primary" href="/simplynews/admin/public/penulis/">
            <?php
          } else {
            ?>
          <li class="nav-item">
            <a class="nav-link text-secondary" href="/simplynews/admin/public/penulis/">
            <?php
          }
            ?>
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Kelola Penulis</span></a>
          </li>

          <!-- Menu Logout -->
          <form action="/simplynews/admin/public/login/validasiLogin.php?aksi=logout" method="post" id="logout">
            <li class="nav-item text-primary">
              <button class="nav-link text-secondary" type="submit" style="border: none; background: none; cursor: pointer;" onclick="javascript: return confirm('Apakah Anda yakin ingin Keluar?')">
                <i class="fas fa-fw fa-sign-out-alt"></i> <span>Logout</span>
              </button>
            </li>
          </form>

          <!-- Divider -->
          <hr class="sidebar-divider" />

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
</ul>
<!-- End of Sidebar -->