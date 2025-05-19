

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
                    <div class="col-md-10 offset-md-1" style="margin-top: 45px; ">
                        <div class="card">
                            <div class="card-title">
                                <h4 class="p-3 text-center">Settings</h4>
                                <hr>
                            </div>
                            <div class="card-body">
                                    
                            <form action="<?php echo e(route('backoffice.update-settings',$Banner->id)); ?>" method="post" enctype="multipart/form-data">
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
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="banner_name">Banner Name</label>
                                        <input type="text" class="form-control my-2" name="banner_name" placeholder="Banner Name" value="<?php echo e($Banner->banner_name); ?>">
                                        <span class="text-danger"><?php $__errorArgs = ['banner_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="banner_code">Banner Code</label>
                                        <input type="text" class="form-control my-2" name="banner_code" placeholder="Banner Code" value="<?php echo e($Banner->banner_code); ?>">
                                        <span class="text-danger"><?php $__errorArgs = ['banner_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="banner_url">Banner Url</label>
                                        <input type="text" class="form-control my-2" name="banner_url" placeholder="Banner Url" value="<?php echo e($Banner->banner_url); ?>">
                                        <span class="text-danger"><?php $__errorArgs = ['banner_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="banner_mobile">Mobile No</label>
                                        <input type="text" class="form-control my-2" name="banner_mobile" placeholder="Banner Mobile No" value="<?php echo e($Banner->banner_mobile); ?>">
                                        <span class="text-danger"><?php $__errorArgs = ['banner_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="banner_email">Banner Email</label>
                                        <input type="text" class="form-control my-2" name="banner_email" placeholder="Banner Email" value="<?php echo e($Banner->banner_email); ?>">
                                        <span class="text-danger"><?php $__errorArgs = ['banner_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="banner_logo">Banner Logo</label>
                                        <input 
                                            type="file" 
                                            class="form-control my-2" 
                                            name="banner_logo" 
                                            value="<?php echo e(old('banner_logo')); ?>"
                                        >
                                        <span class="text-danger"><?php $__errorArgs = ['banner_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Banner Address</label>
                                        <input type="text" class="form-control my-2" name="banner_address" value="<?php echo e($Banner->banner_address); ?>"/>
                                        <span class="text-danger"><?php $__errorArgs = ['banner_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning mt-2 float-right">Update</button>
                                </div>
                                
                                <br>
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
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shoepossie-ofline\resources\views/settings/systemSettings.blade.php ENDPATH**/ ?>