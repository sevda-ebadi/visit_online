


<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right">

                    
                    <h2 class="az-content-title"> حقوق ها   <?php if(isset($description)): ?> ( <?php echo e($description); ?> ) <?php endif; ?>  </h2>
                </div>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        
                        <th class="wd-15p">حقوق کامل</th>
                        <th class="wd-15p">سال</th>
                        <th class="wd-15p">ماه</th>
                        <th class="wd-20p">حقوق پایه</th>
                        <th class="wd-10p">شغل</th>
                        <th class="wd-25p">نام فرد</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($salaries) > 0): ?>
                        <?php $__currentLoopData = $salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                
                                    
                                    
                                    
                                
                                <td> تومان <?php echo e($salary->child_allowance + $salary->reward + $salary->base_salary); ?></td>
                                <td>  <?php echo e($salary->year); ?></td>
                                <td>  <?php echo e($salary->month); ?></td>
                                <td> تومان <?php echo e($salary->base_salary); ?></td>
                                <td><?php echo e($salary->have_salary()->first()->field != null ? $salary->have_salary()->first()->field : $salary->have_salary()->first()->type); ?></td>
                                <td><?php echo e($salary->have_salary()->first()->user()->first()->name.' '.$salary->have_salary()->first()->user()->first()->family); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-primary">
                            هیچ حقوقی ثبت نشده است.
                        </div>
                    <?php endif; ?>
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/salaries/salaries.blade.php ENDPATH**/ ?>