

<?php $__env->startSection('custom_style'); ?>
    <style>
        .select2-results__option {
            text-align: right;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <form method="post" action="<?php echo e(route('sections.store')); ?>" class="az-content-body">
                <?php echo csrf_field(); ?>
                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='<?php echo e(route('sections.index')); ?>'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">بازگشت به لیست بخش ها</button>
                    <h2 class="az-content-title"> ثبت بخش جدید </h2>
                </div>


                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام بخش</p>
                        <input value="<?php echo e(old('name')); ?>" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">تعداد تخت</p>
                        <input value="<?php echo e(old('number_of_bed')); ?>" name="number_of_bed" style="text-align: right" class="form-control" placeholder="تعداد تخت" type="number">
                    </div><!-- col -->
                </div><!-- row -->


                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام کلینیک</p>
                        <select name="clinic_id" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            <?php if(count($clinics) > 0): ?>
                                <?php $__currentLoopData = $clinics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option style="text-align: right;" value="<?php echo e($clinic->id); ?>"><?php echo e($clinic->name); ?> ( <?php echo e($clinic->address); ?> )</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div><!-- col-4 -->
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


<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/sections/create_section.blade.php ENDPATH**/ ?>