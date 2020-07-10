


<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right   ">

                    <h2 class="az-content-title"> ویزیت ها   <?php if(isset($description)): ?>   ( <?php echo e($description); ?> ) <?php endif; ?>  </h2>
                </div>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">ساعت</th>
                        <th class="wd-20p">تاریخ</th>
                        <th class="wd-10p">بیمار</th>
                        <th class="wd-25p">پزشک</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($visits) > 0): ?>
                        <?php $__currentLoopData = $visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>
                                    <button onclick="window.location='<?php echo e(route('visit_medicines', ['visit_id'=>$visit->id])); ?>'" class="btn btn-primary btn-rounded">دارو ها</button>
                                    <button class="btn btn-warning btn-rounded">ویرایش</button>
                                    <button class="btn btn-danger btn-rounded">حذف</button>
                                </td>
                                <td><?php echo e(\Hekmatinasser\Verta\Verta::instance($visit->time)->format('h-m')); ?></td>
                                <td><?php echo e(\Hekmatinasser\Verta\Verta::instance($visit->time)->format('Y-n-j')); ?></td>

                                <td>
                                    <?php echo e($visit->patient()->first()->user()->first()->name.' '.$visit->patient()->first()->user()->first()->family); ?>

                                </td>
                                <td>
                                    <?php echo e($visit->doctor()->first()->user()->first()->name.' '.$visit->doctor()->first()->user()->first()->family); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-primary">
                            هیچ بخش درمانی ثبت نشده است.
                        </div>
                    <?php endif; ?>
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/visits/visits.blade.php ENDPATH**/ ?>