  


<?php $__env->startSection('content'); ?>

    <?php if(session('message')): ?>
        <div class="alert alert-danger"><?php echo e(flash('message')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(url('admin-panel/')); ?>" method="post">
        <div class="form-group has-feedback <?php if($errors && $errors->has('user_name')): ?> has-error <?php endif; ?>">
            <input type="text" name="user_name" class="form-control" placeholder="Username" value="<?php echo e($old?$old['user_name']:''); ?>">
            <span class="fa fa-user form-control-feedback"></span>
            <?php if($errors && $errors->has('user_name')): ?>
                <div class="help-block"><?php echo e($errors->first('user_name')); ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group has-feedback <?php if($errors && $errors->has('password')): ?> has-error <?php endif; ?>">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php if($errors && $errors->has('password')): ?>
                <div class="help-block"><?php echo e($errors->first('password')); ?></div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.auth.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\blog\views/admin/auth/login.blade.php ENDPATH**/ ?>