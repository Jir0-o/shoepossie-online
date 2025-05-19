<?php
$user_id = session()->get('LoggedUser');
$user_data = \App\Models\BackofficeLogin::join('backoffice_role', 'backoffice_role.role_id', '=', 'backoffice_login.role_id')
->where('login_id', $user_id)
->first();
$banner_Information= \App\Models\BannerInformation::first();
?>



<?php $__env->startSection('content'); ?>
<div class="container-scroller">
    <?php echo $__env->make('dashboard.pertials.sideNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles light"></div>
                <div class="tiles dark"></div>
            </div>
        </div>
        <?php echo $__env->make('dashboard.pertials.topNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">Daily Sales</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Reports</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Daily Sales </li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <?php if($user_data->role_id==4): ?>

                            <?php else: ?>
                            <div class="text-end mt-3 mr-4">
                                <button id="addVat" class="btn btn-outline-primary btn-sm">To Vat</button>
                            </div>
                            <?php endif; ?>


                            <div class="card-body">
                                <h4 class="card-title text-center">Daily Sales</h4>
                                <div style="overflow-x:scroll;">
                                    <table id="example" class="table table-bordered">

                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>SL</th>
                                                <th>Order No</th>
                                                <th>Article/Qty/Brand</th>
                                                <th>Payment Method</th>
                                                <th>Create Date & Time</th>
                                                <th>Total</th>
                                                <th>Discount</th>
                                                <th>Paid</th>
                                                <th>Created By</th>
                                                <th>Customer</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; ?>
                                            <?php $__currentLoopData = $CartInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td value="<?php echo e($user->cart_id); ?>" class="also checkboxonly-<?php echo e($i); ?>"></td>
                                                <td style="width: 10px;"><?php echo e($i++); ?></td>
                                                <td style="width: 60px;"><?php echo e($user->cart_id); ?></td>
                                                <td style="width: 250px;">
                                                    <?php
                                                    $cart_item_data = \App\Models\CartItem::join('products', 'products.product_id', '=', 'cart_items.product_id')
                                                    ->join('product_materials', 'product_materials.product_material_id', '=', 'cart_items.product_id')
                                                    ->join('sizes', 'sizes.size_id', '=', 'cart_items.size_id')
                                                    ->join('colors', 'colors.colors_id', '=', 'cart_items.colors_id')
                                                    ->join('brand_types', 'brand_types.brand_type_id', '=', 'product_materials.brand_type_id')
                                                    ->where('cart_items.cart_id', $user->cart_id)
                                                    ->select('cart_items.quantity', 'products.product_name','cart_items.barcode','product_materials.product_material_name','colors.colors_name','sizes.size_name','brand_types.brand_type_name')
                                                    ->get();
                                                    ?>
                                                    <?php $__currentLoopData = $cart_item_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="row pr-3 pt-2">
                                                        <div class="col-12 col-lg-6 col-md-6 ">
                                                            <?php echo e($itemdata->barcode); ?>/( <?php echo e($itemdata->quantity); ?>)/<?php echo e($itemdata->brand_type_name); ?>

                                                        </div>
                                                        
                                                        
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td style="width: 60px;"><?php echo e($user->payment_method); ?></td>
                                <td style="width: 60px;"><?php echo e($user->cart_date); ?></td>
                                <td style="width: 60px;" class="text-right"><?php echo e($user->total_cart_amount); ?></td>
                                <td style="width: 60px;" class="text-right"><?php echo e($user->total_discount); ?></td>
                                <td style="width: 60px;" class="text-right"><?php echo e($user->paid_amount); ?></td>
                                <td style="width: 60px;"><?php echo e($user->created_by_name); ?></td>

                                <td><?php echo e($user->mobile_no); ?></td>

                                <td><a target="_blank" class="brn" href="<?php echo e(route('backoffice.printInvoice', $user->cart_id)); ?>"><img src="<?php echo e(asset('backend/printer.webp')); ?>" alt="print"></a>
                                </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <th></th>
                                        <th>SL</th>
                                        <th>Order No</th>
                                        <th>Article/Qty</th>
                                        <th>Payment Method</th>
                                        <th>Create Date & Time</th>
                                        <th>Total</th>
                                        <th>Discount</th>
                                        <th>Paid</th>
                                        <th>Created By</th>
                                        <th>Customer</th>
                                        <th>Action</th>
                                    </tr>
                                    
                                    
                                </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script src="<?php echo e(asset('assets/js/jquery/jquery.slim.min.js')); ?>" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#addVat', function() {
                var selectedRowIds = [];

                $('#dailychecked tbody input[type="checkbox"]:checked').each(function() {
                    var rowId = $(this).closest('tr').find('td:nth-child(1)').attr('value'); // Assuming the ID is in the third column (index 2)
                    selectedRowIds.push(rowId);
                });

                // Retrieve IDs from all pages
                if ($('#dailychecked').DataTable().page.info().pages > 1) {
                    var currentPage = $('#dailychecked').DataTable().page();
                    // console.log('Hello');
                    $('#dailychecked').DataTable().page.len(-1).draw(); // Show all rows on a single page
                    $('#dailychecked tbody input[type="checkbox"]:checked').each(function() {
                        var rowId = $(this).closest('tr').find('td:nth-child(1)').attr('value'); // Assuming the ID is in the third column (index 2)
                        if (!selectedRowIds.includes(rowId)) {
                            selectedRowIds.push(rowId);
                        }
                    });
                    $('#dailychecked').DataTable().page.len(10).draw(); // Restore original page length
                    $('#dailychecked').DataTable().page(currentPage).draw(); // Return to original page
                }

                console.log(selectedRowIds);

                $.ajax({
                    url: "all_sales_report_show_vat_admin",
                    method: "GET",
                    data: {
                        'selectedRowIds': selectedRowIds,
                    },
                    dataType: "json",
                    success: function(response) {
                        // $('#tableVaue').empty();
                        swal("Success!", "SuccessFully Add For Vat Show", response.success)
                        // console.log(response.status);
                    }
                });
            });

        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shoe_Possie\Shoepossie-Online\resources\views/sales/dailySalesReport.blade.php ENDPATH**/ ?>