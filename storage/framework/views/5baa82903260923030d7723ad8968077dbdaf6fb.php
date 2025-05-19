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

    <link href="<?php echo e(asset('assets/css/all.min.css')); ?>" rel="stylesheet">

    <!--CSS files for data table-->
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome (all.min.css) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- DataTables core -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- DataTables Bootstrap 4 integration -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    <!-- DataTables Buttons extension -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">


    <link href="<?php echo e(asset('assets/css/local/select2.min.css')); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/style.css')); ?>" />
    <link href="<?php echo e(asset('assets/css/local/select2.min.css')); ?>" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/select2.min.js')); ?>"></script>
</head>

<body class="<?php echo e(Route::is('backoffice.salesNew')? 'sidebar-icon-only': ''); ?>">
    <div>
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <?php if(!Route::is('backoffice.salesNew')): ?>
            <?php echo $__env->make('dashboard.pertials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

    <!-- Local jQuery -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>

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
    <!-- DataTables core -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons extension -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- JSZip (for Excel export) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- pdfmake (for PDF export) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/jQuery.print.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/sweetalert.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/select2.min.js')); ?>"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery/jQuery.print.min.js')); ?>"></script>
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
            
                var stockTable = $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                initComplete: function () {
                    this.api().columns().every(function () {
                        var that = this;
                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
                },
            });

            // Update table on category change
            $('#category_id').on('change', function () {
                let selected = $(this).val();
                if (selected) {
                    let categoryText = $('#category_id option:selected').text().trim();
                    stockTable.column(2).search(categoryText).draw(); // Column index 2 = Category
                } else {
                    stockTable.column(2).search('').draw();
                }
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

            // Category dropdown filtering (assumes Category is in column index 2)
            $('#category_id').on('change', function () {
                let selected = $(this).val();
                if (selected) {
                    // Match category text from <option>
                    let categoryText = $('#category_id option:selected').text().trim();
                    table.column(2).search(categoryText).draw();
                } else {
                    table.column(2).search('').draw();
                }
            });
        });
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\Shoe_Possie\Shoepossie-Online\resources\views/layouts/layout.blade.php ENDPATH**/ ?>