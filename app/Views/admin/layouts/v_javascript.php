    <!-- jQuery -->
    <script src="<?= base_url('/assets/template/vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('/assets/template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('/assets/template/vendors/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- NProgress -->
    <script src="<?= base_url('/assets/template/vendors/nprogress/nprogress.js'); ?>"></script>
    <!-- Datatables -->
    <script src="<?= base_url('/assets/template/vendors/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-buttons/js/buttons.flash.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/jszip/dist/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/pdfmake/build/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/pdfmake/build/vfs_fonts.js'); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('/assets/template/build/js/custom.min.js'); ?>"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        function previewImg() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');


            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>