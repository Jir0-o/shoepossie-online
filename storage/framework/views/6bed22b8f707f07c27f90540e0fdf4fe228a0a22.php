


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

        
        <div class="modal fade" id="salary-type-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Salary Type</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('backoffice.salary-type-add')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Salary Type Name</label>
                          <input type="text" required class="form-control" name="salary_type_name" id="exampleFormControlInput1" placeholder="Salary Type Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Status</label>
                          <select class="form-control" name="is_active" required id="exampleFormControlSelect1">
                            <option value="">Select Salary Type</option>
                            <option selected value="1">Active</option>
                            <option value="0">Deactive</option>
                          </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                          </div>
                      </form>
                </div>

              </div>
            </div>
          </div>
        
        <?php echo $__env->make('dashboard.pertials.topNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">Salary Type</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Salary Type</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Home </li>
                        </ol>
                    </nav>
                </div>
                <?php if(session()->has('success')): ?>
                <div class="alert alert-info" role="alert">
                    <strong><?php echo e(session()->get('success')); ?></strong>
                  </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="text-end mt-3 mr-4">
                                <button data-toggle="modal" data-target="#salary-type-modal" class="btn btn-outline-primary btn-sm">Add Salary Type</button>
                             </div>
                            <div class="card-body">
                                <h4 class="card-title text-center">Salary type</h4>
                                <div>
                                    <table id="example" class="table table-bordered">

                                        <thead>
                                            <tr>

                                                <th>SL</th>
                                                <th>Salary Type Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $salaryTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salaryType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td ><?php echo e($loop->index+1); ?></td>
                                                <td ><?php echo e($salaryType->salary_type_name); ?></td>
                                                <td ><?php if($salaryType->is_active==1): ?>
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                <?php else: ?>
                                                <span class="badge badge-pill badge-danger">Deactive</span>
                                                <?php endif; ?></td>
                                                <td><a href="<?php echo e(route('backoffice.salary-type-edit',encrypt($salaryType->salary_type_id))); ?>" class="btn btn-outline-primary">Edit</a></td>
                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
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

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\shoepossie-ofline\resources\views/dashboard/salaryType/salary.blade.php ENDPATH**/ ?>