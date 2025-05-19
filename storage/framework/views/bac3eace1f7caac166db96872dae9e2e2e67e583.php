

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
                    <h3 class="page-title">Daily Purchase</h3>
                    <nav aria-label="breadcrumb"> 
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Reports</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Daily Purchase </li>
                        </ol>
                    </nav>

                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Daily Purchase</h4>
                                <div style="overflow-x:scroll;">
                                    <table id="example" class="table table-bordered">

                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Action</th>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Material</th>
                                                <th>Brand</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Batch</th>
                                                <th>Purchase Price</th>
                                                <th>WholeSell Price</th>
                                                <th>Sales Price</th>
                                                <th>Discount</th>
                                                <th>Qty</th>
                                                <th>Vat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $getDailyPurchase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getDailyPurchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->index+1); ?></td>
                                                    <td><a href="<?php echo e(route('backoffice.dailyPurchaseBarcode',encrypt($getDailyPurchase->purchase_details_id))); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo e(asset('/backend/printer.webp')); ?>" alt=""></a></td>
                                                    <td><?php echo e($getDailyPurchase->product_material_name); ?></td>
                                                    <td><?php echo e($getDailyPurchase->foot_ware_categories_name); ?></td>
                                                    <td><?php echo e($getDailyPurchase->type_name); ?></td>
                                                    <td><?php echo e($getDailyPurchase->material_type_name); ?></td>
                                                    <td><?php echo e($getDailyPurchase->brand_type_name); ?></td>
                                                    <td><?php echo e($getDailyPurchase->colors_name); ?></td>
                                                    <td><?php echo e($getDailyPurchase->size_name); ?></td>
                                                    <td><?php echo e($getDailyPurchase->batch); ?></td>
                                                    <td class="text-end"><?php echo e($getDailyPurchase->purchase_price); ?></td>
                                                    <td class="text-end"><?php echo e($getDailyPurchase->wholesale_price); ?></td>
                                                    <td class="text-end"><?php echo e($getDailyPurchase->sales_price); ?></td>
                                                    <td class="text-end"><?php echo e($getDailyPurchase->discount); ?></td>
                                                    <td><?php echo e($getDailyPurchase->quantity); ?></td>
                                                    <td><?php echo e($getDailyPurchase->vat); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <td>Total:</td>
                                              <td colspan="10" class="text-end font-weight-bold"><?php echo e($getPurchaseTotal); ?></td>
                                              <td class="text-end font-weight-bold"><?php echo e($getWholeSellPrice); ?></td>
                                              <td class="text-end font-weight-bold"><?php echo e($getSalesTotal); ?></td>
                                              <td class="text-end font-weight-bold"><?php echo e($totalDiscount); ?></td>
                                              <td class="font-weight-bold"><?php echo e($totalQty); ?></td>
                                              <td class="font-weight-bold"><?php echo e($totalVat); ?></td>
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

        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\shoepossie-ofline\resources\views/dashboard/purchaseNew/dailyPurchaseReportNew.blade.php ENDPATH**/ ?>