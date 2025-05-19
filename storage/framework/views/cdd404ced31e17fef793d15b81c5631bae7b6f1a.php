

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
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-2" style="margin-top: 45px; ">
                        <div class="card">
                            <div class="card-title">
                                <h4 class="p-3 text-center">Backoffice Register</h4>
                                <hr />
                            </div>
                            <div class="card-body">
                                
                          <form action="<?php echo e(route('backoffice.update-backoffice-user')); ?>" method="post" autocomplete="off">
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
        
                            <?php echo csrf_field(); ?>
                            
                            <?php $__currentLoopData = $backoffice_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $backofffice_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                              <input type="hidden" name="login_id" value="<?php echo e($backofffice_user->login_id); ?>">
                              <div class="form-group"> 
                                  <label for="office_user_id">Office User Id</label>
                                  <input type="text" class="form-control my-2" name="office_user_id" placeholder="Enter Office User Id" value="<?php echo e($backofffice_user->office_user_id); ?>">
                                  <span class="text-danger"><?php $__errorArgs = ['office_user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                              <div class="form-group">
                                  <label for="name">Full Name</label>
                                  <input type="text" class="form-control my-2" name="name" placeholder="Enter full name" value="<?php echo e($backofffice_user->full_name); ?>">
                                  <span class="text-danger"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                              <div class="form-group">
                                  <label for="uname">User Name</label>
                                  <input type="text" class="form-control my-2" name="uname" placeholder="Enter user name" value="<?php echo e($backofffice_user->login_user_name); ?>">
                                  <span class="text-danger"><?php $__errorArgs = ['uname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                              <div class="form-group">
                                  <label for="backoffice_role">Select Your Role</label>
                                  <select class="form-control my-2" name="backoffice_role">
                                      <option selected="true" disabled="disabled">-----------Select----------</option>
                                      <?php $__currentLoopData = $backoffice_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option  value="<?php echo e($role->role_id); ?>" <?php echo e($backofffice_user->role_id == $role->role_id ? 'selected' : ''); ?>><?php echo e($role->role_name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                  <span class="text-danger"><?php $__errorArgs = ['backoffice_role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control my-2" name="email" placeholder="Enter email address" value="<?php echo e($backofffice_user->user_email); ?>">
                                <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                              <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" class="form-control my-2" name="password" placeholder="Enter password">
                                  <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary my-2">Register</button>
                                  <a class="btn btn-primary mt-2 float-right" class="text-light" href="<?php echo e(route('backoffice.all-backoffice-user')); ?>">Back</a>
                              </div>
                              <br>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </form>     
                            </div>
                          
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
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shoepossie-ofline\resources\views/dashboard/backoffice/editBackofficeUser.blade.php ENDPATH**/ ?>