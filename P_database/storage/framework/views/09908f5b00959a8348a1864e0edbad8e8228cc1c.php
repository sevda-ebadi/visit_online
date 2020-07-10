


<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='<?php echo e(route('clinics.create')); ?>'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن بیمارستان جدید</button>
                    <h2 class="az-content-title">بیمارستان ها</h2>
                </div>


                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">تعداد بخش</th>
                        <th class="wd-20p">تعداد تخت</th>
                        <th class="wd-10p">آدرس</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($clinics) > 0): ?>
                        <?php $__currentLoopData = $clinics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>
                                    <button onclick="window.location='<?php echo e(route('clinic_sections', ['clinic_id'=>$clinic->id])); ?>'" class="btn btn-primary btn-rounded">بخش ها</button>
                                    <button onclick="window.location='<?php echo e(route('clinics.edit', ['clinic'=>$clinic])); ?>'" class="btn btn-warning btn-rounded">ویرایش</button>
                                    <form method="post" action="<?php echo e(route('clinics.destroy', ['clinic'=>$clinic])); ?>" style="display: inline;"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="btn btn-danger btn-rounded">حذف</button></form>
                                </td>
                                <td><?php echo e(count($clinic->sections()->get())); ?></td>
                                <td><?php echo e(($clinic->sections()->sum('number_of_bed'))); ?></td>
                                <td><?php echo e($clinic->address); ?></td>
                                <td><?php echo e($clinic->name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-primary">
                            هیچ کلینیک درمانی ثبت نشده است
                        </div>
                    <?php endif; ?>
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\hamidreza_ghanbari_956127026\P_database\resources\views/admin_admin/clinics/clinics.blade.php ENDPATH**/ ?>