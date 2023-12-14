      <!-- Footer-->
      <footer class="border-top">
        <div class="container px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
              <ul class="list-inline text-center">
                <li class="list-inline-item">
                  <a href="#!">
                    <span class="fa-stack fa-lg">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#!">
                    <span class="fa-stack fa-lg">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#!">
                    <span class="fa-stack fa-lg">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
              </ul>
              <div class="small text-center text-muted fst-italic">Simply News &copy; Junior Web Development 2023</div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Bootstrap core JS-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Core theme JS-->
      <script src="../menu/src/js/scripts.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
      <!-- arahkan ke saya.js -->
      <script src="../menu/src/js/saya.js"></script>
      <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbxrIqJj4ijlwHqtlY5H_V8w6SGxWk5d8NIGzOhzBLwpnWkHV4S2CBiy5LBx7HmB_aOd/exec'
        const form = document.forms['web-situs-berita-jwd']
        const btnKirim = document.querySelector('.btn-kirim');
        const btnLoading = document.querySelector('.btn-loading');
        const myAlert = document.querySelector('.my-alert');


        form.addEventListener('submit', e => {
          e.preventDefault()
          // ketika tomvol submit diklik
          // tampilkan tombol loading, hilangkan tombol kirim
          btnLoading.classList.toggle('d-none');
          btnKirim.classList.toggle('d-none');

          fetch(scriptURL, {
              method: 'POST',
              body: new FormData(form)
            })
            .then(response => {
              // tampilkan tombol kirim, hilangkan tombol loading
              btnLoading.classList.toggle('d-none');
              btnKirim.classList.toggle('d-none');
              // tampilkan alert
              myAlert.classList.toggle('d-none');
              // reset formnya
              form.reset();
              // hilangkan alert setelah 5 detik
              setTimeout(function() {
                myAlert.classList.toggle('d-none');
              }, 5000);
              console.log('Success!', response)
            })
            .catch(error => console.error('Error!', error.message))
        })
      </script>
      </body>

      </html>