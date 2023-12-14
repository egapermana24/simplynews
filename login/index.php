<!-- jika sudah login maka tidak boleh ke halaman ini -->
<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: ../admin/public/dashboard/');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simply News - Login</title>

  <!-- Custom fonts for this template-->
  <link rel="icon" href="../template/img/tab.png" type="image/x-icon">
  <link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0 bg-gradient-light">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-10">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-primary mb-4">Silahkan Login</h1>
                  </div>
                  <form class="user" action="../admin/public/login/validasiLogin.php?aksi=login" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                      <hr>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <!-- arahkan ke halaman home -->
                  <hr>
                  <div class="text-center">
                    <a href="../home/" class="text-gray" style="text-decoration: none; font-size: 15px;">Ke Halaman Utama</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../template/vendor/jquery/jquery.min.js"></script>
  <script src="../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../template/js/sb-admin-2.min.js"></script>

</body>

</html>