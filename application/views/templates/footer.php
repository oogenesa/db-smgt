  <!-- Footer -->

  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  </div>
  <footer class="sticky-footer bg-gradient-pink">
      <div class=" container my-auto">
          <div class="copyright text-center my-auto text-light ">
              <!-- <span>Copyright &copy; Your Website <?= date('Y'); ?></span> -->
              <span>Bidang Potensi SMGT Depok &copy;</span>
          </div>
      </div>
  </footer>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
              </div>
          </div>
      </div>
  </div>
  <div class="modal fade" id="inisiasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Inisiasi</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Pilih Inisiasi jika ingin Inisiasi</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="<?= base_url('admin/doInisiasi'); ?>">Inisiasi</a>
              </div>
          </div>
      </div>
  </div>
  <div id="myModal" class="modal">
      <!-- The Close Button -->
      <button id="closes" class="button" onclick="tess(this)">&times;</button>
      <div class="modal-dialog">
          <!-- Modal Content (The Image) -->
          <img class="modal-content" id="img01" style="max-width:600px;">
          <!-- <button id="closes" class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              <span id="closes" class="close">&times;</span>
          </button> -->
      </div>
      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
  </div>
  <!-- Bootstrap core JavaScript-->

  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script>
      $('.custom-file-input').change(function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);

      });
      var modal = document.getElementById("myModal");

      // Get the image and insert it inside the modal - use its "alt" text as a caption
      var img = document.getElementById("myImg");
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      img.onclick = function() {
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
      }

      // Get the <span> element that closes the modal
      var span = document.getElementById("closes");

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
          console.log('cksk');
          modal.style.display = "none";

      }

      function tess(x) {
          console.log(x);
          modal.style.display = "none";

      }
  </script>

  </body>

  </html>