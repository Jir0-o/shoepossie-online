

<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-5" style="padding-bottom: 10%;>
        <div class=" row">
    <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
        <div class="card">
            <div class="card-title">
                <h4 class="p-3 text-center">Login</h4>
                <hr>
            </div>


            <div class="card-body">

                <form action="<?php echo e(route('backoffice.check')); ?>" method="post" autocomplete="off">
                    <?php if(Session::get('fail')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(Session::get('fail')); ?>

                    </div>
                    <?php endif; ?>
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control my-2" name="email" placeholder="Enter email address"
                            value="<?php echo e(old('email')); ?>">
                        <span class="text-danger">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>

                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control my-2" name="password" placeholder="Enter password"
                            value="<?php echo e(old('password')); ?>">
                        <span class="text-danger">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>

                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\shoepossie-ofline\resources\views/dashboard/backoffice/login.blade.php ENDPATH**/ ?>