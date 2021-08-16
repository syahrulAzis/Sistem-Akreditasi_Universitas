        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 - <?php echo date('Y'); ?> | All rights reserved. Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="https://www.instagram.com/_ilhamhadi/" target="_blank" class="pr-3">Ilhamhadi</a><i class="icon-social-github text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="<?php echo base_url(); ?>assets/js/template.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="<?php echo base_url(); ?>assets/js/data-table.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/toastDemo.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/file-upload.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/typeahead.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/select2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/modal-demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>
        <script>
          $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('//').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
          });

          $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
              url: "<?= base_url('aksesmenu/changeaccess'); ?>",
              type: 'post',
              data: {
                menuId: menuId,
                roleId: roleId
              },
              success: function() {
                document.location.href = "<?= base_url('aksesmenu/access/'); ?>" + roleId;
              }
            });
          });
        </script>
        <script>
          $('.custom-file-input'.on('change', function() {
            let fileName = $(this).val().split('//').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
          }));

          $('.form-check-input').on('click', function() {
            const pendidikanId = $(this).data('pendidikan');
            const jadId = $(this).data('jad');

            $.ajax({
              url: "<?= base_url('pendidikan/changejad'); ?>",
              type: 'post',
              data: {
                pendidikanId: pendidikanId,
                jadId: jadId
              },
              success: function() {
                document.location.href = "<?= base_url('pendidikan/adddokumen/'); ?>" + pendidikanId;
              }
            });
          });
        </script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.media.js"></script>
        <script type="text/javascript">
          $(function() {
            $('.media').media({
              width: 868
            });
          });
        </script>
        <!-- End custom js for this page-->

        </body>

        </html>