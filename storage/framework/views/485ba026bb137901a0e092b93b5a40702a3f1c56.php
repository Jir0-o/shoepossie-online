

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
            <h3 class="page-title">All Payment Report</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Reports</a></li>
                <li class="breadcrumb-item active" aria-current="page"> All Payment Report </li>
                </ol>
            </nav>
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <div class="card-description row">
                        <div class="col-md-5">
                            <!-- <a class="btn btn-outline-info" href="<?php echo e(route('backoffice.supplier-payment')); ?>"><i class="fa fa-credit-card mr-1" aria-hidden="true"></i>Supplier Payment</a>
                            <a class="btn btn-outline-success" href="<?php echo e(route('backoffice.customer-payment')); ?>"><i class="fa fa-credit-card mr-1" aria-hidden="true"></i>Customer Payment</a> -->
                        </div>
                        <div class="col-md-7">
                            <div class="input-group mb-3">
                                
                                <input type="date" class="form-control" id="date" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-light btn" id="inputGroup-sizing-default">Generate</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                
                        <thead>
                        <tr>
                            <th>TRX ID</th>
                            <th>Date</th>
                            <th>Trx Type</th>
                            <th>Trx Mode</th>
                            <th>Amount</th>
                        </tr>
                        
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $bank_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->bank_transaction_id); ?></td>
                                    <td><?php echo e($item->date); ?></td>
                                    <td><?php echo e($item->trx_type); ?></td>
                                    <td><?php echo e($item->trx_mode); ?></td>
                                    <td><?php echo e($item->amount); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
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
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\shoepossie-ofline\resources\views/account/paymentReport.blade.php ENDPATH**/ ?>