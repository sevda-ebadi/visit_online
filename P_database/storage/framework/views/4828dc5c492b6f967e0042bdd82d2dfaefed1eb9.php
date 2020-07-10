

<?php $__env->startSection('custom_style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <form method="post" action="<?php echo e(route('edit_role_permission', ['user'=>$user])); ?>" class="az-content-body">
                <?php echo csrf_field(); ?>
                <div style="text-align: right">

                    <h2 class="az-content-title"> نقش و دسترسی های کاربر <?php echo e($user->name.' '.$user->family); ?></h2>
                </div>


                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row row-sm mg-b-20">
                    <div style="text-align: right" class="col-lg">
                        <p style="text-align: right;">نقش ها</p>

                        <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <span style="direction: rtl" class="col-2">
                                <input name="roles[]" <?php echo e($user->roles->contains($role) ? 'checked' : ''); ?> value="<?php echo e($role->name); ?>" id="<?php echo e('role'.$role->id); ?>" type="checkbox">
                                <label for="<?php echo e('role'.$role->id); ?>"><?php echo e($role->persian_name); ?></label>
                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="alert alert-warning">هیچ نقشی ثبت نشده است</div>
                        <?php endif; ?>

                    </div><!-- col -->
                </div><!-- row -->

                <hr>

                <div class="row row-sm mg-b-20">
                    <div style="text-align: right" class="col-lg">
                        <p style="text-align: right;">دسترسی ها</p>

                        <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <span style="direction: rtl" class="col-2">
                                <input name="permissions[]" <?php echo e($user->permissions->contains($permission) ? 'checked' : ''); ?> value="<?php echo e($permission->name); ?>" id="<?php echo e('permission'.$permission->id); ?>" type="checkbox">
                                <label for="<?php echo e('permission'.$permission->id); ?>"><?php echo e($permission->persian_name); ?></label>
                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="alert alert-warning">هیچ دسترسی ثبت نشده است</div>
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


<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/role_permission/role_permission.blade.php ENDPATH**/ ?>