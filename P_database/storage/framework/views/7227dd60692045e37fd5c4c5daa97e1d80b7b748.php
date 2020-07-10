

<?php $__env->startSection('custom_style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <form method="post"  action="<?php echo e(route('clinics.update', ['clinic'=>$clinic])); ?>" class="az-content-body">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='<?php echo e(route('clinics.index')); ?>'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">بازگشت به لیست کلینیک ها</button>
                    <h2 class="az-content-title"> ویرایش  <?php echo e($clinic->name); ?> </h2>
                </div>


                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام بیمارستان</p>
                        <input value="<?php echo e($clinic->name); ?>" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">آدرس بیمارستان</p>
                        <textarea name="address" style="text-align: right" rows="3" class="form-control" placeholder="ادرس"><?php echo e($clinic->address); ?></textarea>
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


<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/clinics/edit_clinic.blade.php ENDPATH**/ ?>