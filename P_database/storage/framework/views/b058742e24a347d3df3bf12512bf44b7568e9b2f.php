


<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right   ">

                    <h2 class="az-content-title"> ویزیت ها   <?php if(isset($description)): ?>   ( <?php echo e($description); ?> ) <?php endif; ?>  </h2>
                </div>

                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">ساعت</th>
                        <th class="wd-20p">تاریخ</th>
                        <th class="wd-20p">وضعیت</th>
                        <th class="wd-10p">بیمار</th>
                        <th class="wd-25p">پزشک</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>

                                <td>


                                    <button <?php if(count($visit->medicines()->get()) == 0): ?> disabled  <?php endif; ?> onclick="window.location='<?php echo e(route('visit_medicines', ['visit_id'=>$visit->id])); ?>'" class="btn btn-primary btn-rounded">دارو ها</button>

                                    <?php if($visit->status != 2): ?>
                                        <button onclick="window.location='<?php echo e(route('change_visit_status', ['visit'=>$visit])); ?>'" class="btn btn-danger btn-rounded">لغو</button>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($visit->time); ?></td>
                                <td><?php echo e($visit->date); ?></td>
                                <td><?php echo e(checkVisitStatus($visit->status)); ?></td>

                                <td>
                                    <?php echo e($visit->patient()->first()->user()->first()->name.' '.$visit->patient()->first()->user()->first()->family); ?>

                                </td>
                                <td>
                                    <?php echo e($visit->doctor()->first()->user()->first()->name.' '.$visit->doctor()->first()->user()->first()->family); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="alert alert-primary">
                                    هیچ ویزیت ای ثبت نشده است.
                                </div>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\hamidreza_ghanbari_956127026\P_database\resources\views/admin_admin/visits/visits.blade.php ENDPATH**/ ?>