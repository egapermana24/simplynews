</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-gradient-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Simply News &copy; Junior Web Development 2023</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script>
  function handleFileUpload(event) {
    const fileInput = event.target;
    const file = fileInput.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = function(e) {
        const uploadedImage = document.getElementById('uploadGambar');
        const fileName = document.getElementById('namaFile');
        const textUploadGambar = document.getElementById('textUploadGambar');

        uploadedImage.src = e.target.result;
        fileName.textContent = file.name; // Tampilkan nama file
        uploadedImage.classList.remove('d-none');
        uploadedImage.classList.add('d-block');
        textUploadGambar.classList.remove('d-none');
      };

      reader.readAsDataURL(file);
    }
  }
</script>

<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
<script src="../../../template/vendor/jquery/jquery.min.js"></script>
<script src="../../../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../../template/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../../template/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../../template/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../../template/js/demo/chart-area-demo.js"></script>
<script src="../../../template/js/demo/chart-pie-demo.js"></script>
<script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
<!-- arahkan ke saya.js -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    new TypeIt("#dashboard1", {}).go();
    new TypeIt("#dashboard2", {
      startDelay: 2500
    }).go();
    new TypeIt("#dashboard3", {
      startDelay: 4000
    }).go();
  });
</script>
<script>
  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>
</body>

</html>