


<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right">

                    <h2 class="az-content-title">کاربران </h2>
                </div>
                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">شماره تماس</th>
                        <th class="wd-15p">نقش ها</th>
                        <th class="wd-20p">جنسیت</th>
                        <th class="wd-10p">عنوان</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <button onclick="window.location='<?php echo e(route('edit_role_permission_view', ['user'=>$user])); ?>'" class="btn btn-primary btn-rounded">ویرایش نقش</button>
                                    <button onclick="window.location='<?php echo e(route('users.edit', ['user'=>$user])); ?>'" class="btn btn-warning btn-rounded">ویرایش</button>
                                    <button class="btn btn-danger btn-rounded">حذف</button>
                                </td>
                                <td><?php echo e($user->phone); ?></td>

                                <td>
                                    <?php $__empty_2 = true; $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <span class="badge badge-primary"><?php echo e($role->persian_name); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        <span class="badge badge-warning">بدون نقش</span>
                                    <?php endif; ?>
                                </td>


                                <td><?php echo e(checkGender($user->sex)); ?></td>
                                <?php if($user->doctor()->first() != null): ?>
                                    <td>پزشک</td>
                                <?php else: ?>
                                    <?php if($user->patient()->first() != null): ?>
                                        <td>بیمار</td>
                                    <?php else: ?>
                                        <td><?php echo e($user->employee()->first() == "" ? '----' : $user->employee()->first()->type); ?></td>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <td><?php echo e($user->name.' '.$user->family); ?></td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/users/users.blade.php ENDPATH**/ ?>