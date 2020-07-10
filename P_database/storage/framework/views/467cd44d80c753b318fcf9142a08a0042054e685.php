

<?php $__env->startSection('custom_style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <form method="post" action="<?php echo e(route('roles.store')); ?>" class="az-content-body">
                <?php echo csrf_field(); ?>
                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='<?php echo e(route('roles.index')); ?>'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">بازگشت به لیست نقش ها</button>
                    <h2 class="az-content-title"> ثبت نقش جدید </h2>
                </div>


                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام نقش</p>
                        <input value="<?php echo e(old('name')); ?>" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                        <?php if($errors->has('name')): ?>
                            <small style="text-align: right" class="form-text text-danger"><?php echo e($errors->first('name')); ?></small>
                        <?php endif; ?>
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام فارسی نقش</p>
                        <input value="<?php echo e(old('persian_name')); ?>" name="persian_name" style="text-align: right" class="form-control" placeholder="نام فارسی" type="text">
                        <?php if($errors->has('persian_name')): ?>
                            <small style="text-align: right" class="form-text text-danger"><?php echo e($errors->first('persian_name')); ?></small>
                        <?php endif; ?>
                    </div><!-- col -->
                </div><!-- row -->


                <div class="row row-sm">
                    <div class="col-lg">
                        <button type="submit" class="btn btn-primary">ثبت </button>
                    </div><!-- col -->
                </div>

            </form><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/role_permission/create_role.blade.php ENDPATH**/ ?>