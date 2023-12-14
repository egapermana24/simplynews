<?php
include "../menu/header.php";
?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('../menu/src/assets/img/koran.webp'); background-attachment: fixed;">
  <div class="container position-relative px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="page-heading">
          <h1>Hubungi Kami</h1>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Main Content-->
<main class="mb-4">
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <p>
          Ingin Memberikan saran kepada kami agar website ini semakin baik dan optimal? Silahkan sempatkan waktu kamu untuk mengisi data dibawah ini lalu ajukan kritik dan saran agar website kami semakin hari semakin baik!
        </p>
        <div class="my-5">
          <div class="alert alert-primary alert-dismissible fade show d-none my-alert" role="alert">
            <strong>Terimakasih!</strong> Pesan kamu sudah kami terima.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="contactForm" name="web-situs-berita-jwd">
            <div class="form-floating">
              <input class="form-control" id="nama" type="text" placeholder="Masukkan namamu..." name="nama" required />
              <label for="nama">Nama</label>
            </div>
            <div class="form-floating">
              <input class="form-control" id="email" type="email" placeholder="Masukkan emailmu..." name="email" required />
              <label for="email">Alamat Email</label>
            </div>
            <div class="form-floating">
              <input class="form-control" id="phone" type="tel" placeholder="Masukkan nomor handphonemu..." name="phone" required />
              <label for="phone">Nomor Handphone / Whatsapp</label>
            </div>
            <div class="form-floating">
              <textarea class="form-control" id="message" placeholder="Ketik pesanmu disini..." style="height: 12rem" name="pesan" required></textarea>
              <label for="message">Pesan</label>
            </div>
            <br />
            <!-- Submit Button-->
            <button class="btn btn-primary text-uppercase btn-kirim" id="submitButton" type="submit">
              Kirim
            </button>
            <button class="btn btn-primary text-uppercase btn-loading d-none" type="button" disabled>
              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
              Loading...
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include "../menu/footer.php";

?>