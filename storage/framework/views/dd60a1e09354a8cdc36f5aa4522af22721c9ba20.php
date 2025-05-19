<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php
    $banner_Information = \App\Models\BannerInformation::first();
    ?>
    <title><?php echo e($banner_Information->banner_name); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/css/vendor.bundle.base.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/font-awesome/css/font-awesome.min.css')); ?>" />
    <link rel="shortcut icon" href="<?php echo e($banner_Information->banner_logo); ?>" type="image/x-icon">

    <!--CSS files for data table-->
    <link type="text/css" rel="stylesheet"
        href="<?php echo e(asset('assets/css/local/dataTables.bootstrap4.min.css')); ?>" />
    <link type="text/css" rel="stylesheet"
        href="<?php echo e(asset('assets/css/local/bootstrap.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/local/all.min.css')); ?>"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?php echo e(asset('assets/css/local/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="<?php echo e(asset('assets/css/local/jquery.dataTables.min.css')); ?>" rel="stylesheet" crossorigin="anonymous">
    <link href="<?php echo e(asset('assets/css/local/buttons.dataTables.min.css')); ?>" rel="stylesheet" crossorigin="anonymous">

    <link href="<?php echo e(asset('assets/css/local/select2.min.css')); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/style.css')); ?>" />
    <link href="<?php echo e(asset('assets/css/local/select2.min.css')); ?>" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/select2.min.js')); ?>"></script>
</head>

<body>
    <div>
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <?php echo $__env->make('dashboard.pertials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <script src="<?php echo e(asset('assets/js/jquery/bootstrap.min.js')); ?>"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="<?php echo e(asset('backend/assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo e(asset('backend/assets/vendors/chart.js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/vendors/flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/vendors/flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/vendors/flot/jquery.flot.categories.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/vendors/flot/jquery.flot.fillbetween.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/vendors/flot/jquery.flot.stack.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/vendors/flot/jquery.flot.pie.js')); ?>"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo e(asset('backend/assets/js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/misc.js')); ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo e(asset('backend/assets/js/dashboard.js')); ?>"></script>


    <!-- End custom js for this page -->

    <!--js files for data table-->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/jquery-3.5.1.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/dataTables.buttons.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/jszip.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/pdfmake.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/vfs_fonts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/buttons.html5.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/buttons.print.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/jQuery.print.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/sweetalert.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/select2.min.js')); ?>"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script>
        //DataTable
        $(document).ready(function() {
            $('#example tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search" />');
            });

            var table = $('#cheack').DataTable({
                'columnDefs': [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                }],
                'select': {
                    'style': 'multi'
                },
                'order': [
                    [1, 'asc']
                ],

            });

            var table = $('#dailychecked').DataTable({
                'columnDefs': [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                }],
                'select': {
                    'style': 'multi'
                },
                'order': [
                    [1, 'asc']
                ],

            });
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                initComplete: function() {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;
                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
            });

            $('#st').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                initComplete: function() {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;
                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
            });
        });
    </script>
</body>

</html><?php /**PATH D:\laragon\www\shoepossie-ofline\resources\views/layouts/layout.blade.php ENDPATH**/ ?>