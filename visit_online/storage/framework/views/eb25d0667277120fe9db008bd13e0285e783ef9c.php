

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
            <form method="post" action="<?php echo e(route('doctors.store')); ?>" class="az-content-body">
                <?php echo csrf_field(); ?>
                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='<?php echo e(route('doctors.index')); ?>'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">بازگشت به لیست پزشکان ها</button>
                    <h2 class="az-content-title"> ثبت پزشک جدید </h2>
                </div>


                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام</p>
                        <input value="<?php echo e(old('name')); ?>" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام خانوادگی</p>
                        <input value="<?php echo e(old('family')); ?>" name="family" style="text-align: right" class="form-control" placeholder="نام خانوادگی" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">تعداد فرزند</p>
                        <input value="<?php echo e(old('number_of_child')); ?>" name="number_of_child" style="text-align: right" class="form-control" placeholder="تعداد فرزند" type="number">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">مدرک</p>
                        <input value="<?php echo e(old('degree')); ?>" name="degree" style="text-align: right" class="form-control" placeholder="مدرک" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">تخصص</p>
                        <input value="<?php echo e(old('field')); ?>" name="field" style="text-align: right" class="form-control" placeholder="تخصص" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">شماره تماس</p>
                        <input value="<?php echo e(old('phone')); ?>" name="phone" style="text-align: right" class="form-control" placeholder="شماره تماس" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">رمز عبور</p>
                        <input  name="password" style="text-align: right" class="form-control" placeholder="رمز عبور" type="password">
                    </div><!-- col -->
                </div><!-- row -->


                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام بخش</p>
                        <select name="section_id" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            <?php if(count($sections) > 0): ?>
                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option style="text-align: right;" value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?> ( <?php echo e($section->clinic()->first() != null ? $section->clinic()->first()->name : '---'); ?> )</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div><!-- col-4 -->
                </div><!-- row -->


                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">وضعیت تاهل</p>
                        <select name="marriage" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            <option value="0">متاهل</option>
                            <option value="1">مجرد</option>
                        </select>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">جنسیت </p>
                        <select name="sex" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            <option value="0">زن</option>
                            <option value="1">مرد</option>
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


<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sevda\Desktop\visit_online\resources\views/admin_admin/doctors/create_doctor.blade.php ENDPATH**/ ?>