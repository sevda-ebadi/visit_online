


<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='<?php echo e(route('doctors.create')); ?>'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن پزشک </button>
                    <h2 class="az-content-title"> دکتر ها   <?php if(isset($description)): ?> ( <?php echo e($description); ?>   ) <?php endif; ?>  </h2>
                </div>


                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">شماره تماس</th>
                        <th class="wd-15p">جنسیت</th>
                        <th class="wd-15p">سن</th>
                        <th class="wd-15p">تعداد فرزند</th>
                        <th class="wd-20p">مدرک</th>
                        <th class="wd-10p">تخصص</th>
                        <th class="wd-25p">نام کامل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($doctors) > 0): ?>
                        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>
                                    <button onclick="window.location='<?php echo e(route('doctor_salary', ['doctor_id'=>$doctor->id])); ?>'" class="btn btn-primary btn-rounded">حقوق ها</button>
                                    <button onclick="window.location='<?php echo e(route('doctors.edit', ['doctor'=>$doctor])); ?>'" class="btn btn-warning btn-rounded">ویرایش</button>
                                    <form method="post" action="<?php echo e(route('doctors.destroy', ['doctor'=>$doctor])); ?>" style="display: inline;"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="btn btn-danger btn-rounded">حذف</button></form>
                                </td>

                                <td><?php echo e($doctor->user()->first()->phone); ?></td>
                                <td><?php echo e(checkGender($doctor->user()->first()->sex)); ?></td>
                                <td><?php echo e(((\Carbon\Carbon::now())->diffInYears($doctor->user()->first()->date_of_birth) != 0) ? (\Carbon\Carbon::now())->diffInYears($doctor->user()->first()->date_of_birth)  : '----'); ?></td>
                                <td><?php echo e($doctor->number_of_child); ?></td>
                                <td><?php echo e($doctor->degree); ?></td>
                                <td><?php echo e($doctor->field); ?></td>
                                <td><?php echo e($doctor->user()->first()->name.' '.$doctor->user()->first()->family); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-primary">
                            هیچ پزشکان ثبت نشده است.
                        </div>
                    <?php endif; ?>
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/doctors/doctors.blade.php ENDPATH**/ ?>