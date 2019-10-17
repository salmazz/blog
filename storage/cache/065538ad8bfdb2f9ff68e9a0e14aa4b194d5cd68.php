<?php echo $__env->make('admin.auth.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo e(url('/')); ?>">Shortly</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php echo $__env->make('admin.auth.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamp\htdocs\blog\views/admin/auth/layouts/layout.blade.php ENDPATH**/ ?>