


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

        
        <div class="modal fade" id="salary-info-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Salary Info</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('backoffice.salary-info-add')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Employee Name</label>
                                    <select class="form-control" name="back_office_login_id" required id="exampleFormControlSelect1">
                                      <option disabled selected value="">----Select Employee Name---</option>
                                      <?php $__currentLoopData = $getBackOfficeEmployee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getBackOfficeEmployees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option  value="<?php echo e($getBackOfficeEmployees->login_id); ?>"><?php echo e($getBackOfficeEmployees->full_name); ?>-Employee ID (<?php echo e($getBackOfficeEmployees->office_user_id); ?>)</option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Salary Type</label>
                                    <select class="form-control" name="salary_type_id" required id="exampleFormControlSelect1">
                                      <option disabled selected value="">----Select Salary Type---</option>
                                      <?php $__currentLoopData = $getsalaryType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getsalaryTypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option  value="<?php echo e($getsalaryTypes->salary_type_id); ?>"><?php echo e($getsalaryTypes->salary_type_name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Salary Amount</label>
                                    <input type="number" min="0" required class="form-control" value="0" name="salary_amount" id="exampleFormControlInput1" placeholder="Salary Amount">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status</label>
                                    <select class="form-control" name="is_active" required id="exampleFormControlSelect1">
                                      <option value="">Select Salary Type</option>
                                      <option selected value="1">Active</option>
                                      <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
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
                    <h3 class="page-title">Salary Info</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Salary Info</a></li>
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
                                <button data-toggle="modal" data-target="#salary-info-modal" class="btn btn-outline-primary btn-sm">Add Salary Info</button>
                             </div>
                            <div class="card-body">
                                <h4 class="card-title text-center">Salary Information</h4>
                                <div>
                                    <table id="example" class="table table-bordered">

                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Employee Id</th>
                                                <th>Salary Type</th>
                                                <th class="text-end">Salary Amount</th>
                                                <th class="text-end">Due</th>
                                                <th class="text-end">Paid</th>
                                                <th class="text-center">Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $getSalaryInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getSalaryInfos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td ><?php echo e($loop->index+1); ?></td>
                                                <td ><?php echo e($getSalaryInfos->full_name); ?>(<?php echo e($getSalaryInfos->office_user_id); ?>)</td>
                                                <td ><?php echo e($getSalaryInfos->salary_type_name); ?></td>
                                                <td class="text-end"><?php echo e($getSalaryInfos->salary_amount); ?></td>
                                                <td class="text-end"><?php echo e($getSalaryInfos->due); ?></td>
                                                <td class="text-end"><?php echo e($getSalaryInfos->paid); ?></td>
                                                <td class="text-center"><?php if($getSalaryInfos->is_active==1): ?>
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                <?php else: ?>
                                                <span class="badge badge-pill badge-danger">Deactive</span>
                                                <?php endif; ?></td>
                                                
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

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shoepossie-ofline\resources\views/dashboard/salaryInfo/salaryInfo.blade.php ENDPATH**/ ?>