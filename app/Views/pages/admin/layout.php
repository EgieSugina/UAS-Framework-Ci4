<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gamegeist |
        <?= $title ?>
    </title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/summernote/summernote-bs4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark">
            <?= view('pages/admin/header'); ?>

        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?= view('pages/admin/aside'); ?>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <?= view('pages/admin/content-header'); ?>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
            </section>
        </div>
        <!-- <aside class="control-sidebar control-sidebar-dark">
        </aside> -->
        <footer class="main-footer">
            <?= view('pages/admin/footer'); ?>

        </footer>
    </div>
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-mousewheel/jquery.mousewheel.js'); ?>"></script>
    <!-- <script src="plugins/raphael/raphael.min.js"></script> -->
    <script src="<?= base_url('assets/dist/js/demo.js'); ?>""></script>


    <!-- DataTable -->
    <script src=" <?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
    <!-- End DataTable -->
    <script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
    <!-- Select2 -->
    <script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>

    <script>
        $(function () {
            $('.select2').select2()
            $('#summernote').summernote()
        })
        function confirmDelete(url) {
            var confirmMessage = "Are you sure you want to delete?";
            if (window.confirm(confirmMessage)) {
                window.location.href = url;
            }
        }
    </script>

    <script>
        $(" #table-main").DataTable({
            responsive: true, lengthChange: false, autoWidth: false, buttons: [{
                text: '<i class="fas fa-solid fa-plus"></i> Tambah', className: 'bg-success', action: function (e, dt, node,
                    config) {const currentURL = window.location.href; window.location.href = `${currentURL}/tambah`;},
            }, {
                extend: 'spacer', style: 'bar'
            }, {
                extend: 'print', className: 'bg-warning',
                text: '<i class="fas fa-print"></i> Print', exportOptions: {columns: 'th:not(:last-child)'}
            },],
        }).buttons().container().appendTo('#table-main_wrapper .col-md-6:eq(0)');
        $(" #table-main2").DataTable({
            responsive: true, lengthChange: false, autoWidth: false, buttons: [],
        }).buttons().container().appendTo('#table-main_wrapper .col-md-6:eq(0)'); 
    </script>

</body>

</html>