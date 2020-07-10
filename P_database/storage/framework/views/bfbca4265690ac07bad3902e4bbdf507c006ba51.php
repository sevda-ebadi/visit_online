


<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right">

                    <h2 class="az-content-title">بیماران </h2>
                </div>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">شماره تماس</th>
                        <th class="wd-15p">تعداد ویزیت</th>
                        <th class="wd-20p">وزن</th>
                        <th class="wd-10p">قد</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($patients) > 0): ?>
                        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>
                                    <button onclick="window.location='<?php echo e(route('patient_visits', ['patient_id'=>$patient->id])); ?>'" class="btn btn-success btn-rounded">ویزیت ها</button>
                                    <button class="btn btn-warning btn-rounded">ویرایش</button>
                                    <button class="btn btn-danger btn-rounded">حذف</button>
                                </td>

                                <td><?php echo e($patient->user()->first()->phone); ?></td>
                                <td><?php echo e(count($patient->visits()->get())); ?></td>
                                <td><?php echo e($patient->weight); ?></td>
                                <td><?php echo e($patient->height); ?></td>
                                <td><?php echo e($patient->user()->first()->name.' '.$patient->user()->first()->family); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-primary">
                            هیچ مراجعه کننده ای ثبت نشده است.
                        </div>
                    <?php endif; ?>
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/patients/patients.blade.php ENDPATH**/ ?>