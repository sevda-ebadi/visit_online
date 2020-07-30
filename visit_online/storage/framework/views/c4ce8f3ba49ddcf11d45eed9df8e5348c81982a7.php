<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right">

                    <h2 class="az-content-title"> دارو ها   <?php if(isset($description)): ?>   ( <?php echo e($description); ?> ) <?php endif; ?>  </h2>
                </div>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        
                        <th class="wd-15p">زمان ویزیت</th>
                        <th class="wd-15p">بیمار</th>
                        
                        <th class="wd-20p">شیوه مصرف</th>
                        <th class="wd-10p">مقدار</th>
                        <th class="wd-25p">نام دارو</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($medicines) > 0): ?>
                        <?php $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                
                                    
                                    
                                    
                                

                                <td><?php echo e(\Hekmatinasser\Verta\Verta::instance($medicine->visit()->first()->created_at)->format('Y-n-j')); ?></td>
                                <td><?php echo e($medicine->visit()->first()->patient()->first()->user()->first()->name.' '.$medicine->visit()->first()->patient()->first()->user()->first()->family); ?></td>
                                
                                <td><?php echo e(\Illuminate\Support\Str::limit($medicine->instruction,25 )); ?></td>
                                <td><?php echo e($medicine->amount); ?></td>
                                <td><?php echo e($medicine->name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-primary">
                            هیچ دارویی ثبت نشده است.
                        </div>
                    <?php endif; ?>
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sevda\Desktop\visit_online\resources\views/admin_admin/medicines/medicines.blade.php ENDPATH**/ ?>