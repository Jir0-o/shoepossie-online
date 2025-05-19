

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
                    <h3 class="page-title">Stock</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Stock</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Stock Report </li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-description btn btn-info"><a class="text-light" href="<?php echo e(route('backoffice.stock-transfer')); ?>">Stock Transfer</a></div>
                                <div class="card-description float-right">
                                    <div class="input-group mb-3">
                                        <select aria-label="Default" aria-describedby="inputGroup-sizing-default" class="form-control" name="category_id" id="category_id">
                                            <option selected disabled>-------Select-------</option>
                                            <?php $__currentLoopData = $product_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->foot_ware_categories_id); ?>"><?php echo e($cat->foot_ware_categories_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary text-light" id="inputGroup-sizing-default">Category</span>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title text-center">Stock Report</h4>
                                <?php if(Session::get('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(Session::get('success')); ?>

                                </div>
                                <?php endif; ?>
                                <?php if(Session::get('fail')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(Session::get('fail')); ?>

                                </div>
                                <?php endif; ?>
                                <div style="overflow-x:scroll;">
                                    <table id="example" class="table table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Article</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Material</th>
                                                <th>Brand</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Location</th>
                                                <th>Purchase QT</th>
                                                <th>Sold </th>
                                                <th>Stock </th>
                                                
                                                <th>Unit Price</th>
                                                <th>Total Value</th>
                                            </tr>

                                        </thead>

                                        <?php
                                            $totalStock = 0;
                                        ?>
                                        <tbody id="stock_table">
                                            <?php $__currentLoopData = $stock_report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $totalStock += $values->final_quantity;
                                            ?>
                                            <tr>
                                                <td><?php echo e($values->product_material_name); ?></td>
                                                <td><?php echo e($values->barcode); ?></td>
                                                <td><?php echo e($values->foot_ware_categories_name); ?></td>
                                                <td><?php echo e($values->type_name); ?></td>
                                                <td><?php echo e($values->material_type_name); ?></td>
                                                <td><?php echo e($values->brand_type_name); ?></td>
                                                <td><?php echo e($values->colors_name); ?></td>
                                                <td><?php echo e($values->size_name); ?></td>
                                                <td><?php echo e($values->store_name); ?></td>
                                                <td><?php echo e($values->total_purchased_quantity ===null ? 0 : $values->total_purchased_quantity); ?></td>
                                                <td><?php echo e($values->total_sold_quantity === null ? 0 : $values->total_sold_quantity); ?></td>
                                                <td class="text-end"><?php echo e($values->final_quantity); ?></td>
                                                
                                                <td class="text-end"><?php echo e($values->sales_price ===null ? 0 : $values->sales_price); ?></td>
                                                <td class="text-end"><?php echo e($values->sales_price ===null ? 0 : $values->sales_price*$values->final_quantity); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Article</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Material</th>
                                                <th>Brand</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Location</th>
                                                <th>Purchase QT</th>
                                                <th>Sold</th>
                                                <th>Stock</th>
                                                
                                                <th>Unit Price</th>
                                                <th>Total Value</th>
                                            </tr>
                                            
                                        </tfoot>
                                    </table>
                                    Total Stock: <strong> <?php echo e($totalStock); ?></strong>
                                    <br>
                                    Total Value: <strong><?php echo e(number_format($totalPrice, 2, '.', ',')); ?></strong>
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

        
        


        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shoe_Possie\Shoepossie-Online\resources\views/dashboard/stock/stockReport.blade.php ENDPATH**/ ?>