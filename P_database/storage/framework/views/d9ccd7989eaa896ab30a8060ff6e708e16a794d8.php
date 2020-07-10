


<?php $__env->startSection('body'); ?>
    <div class="az-content">


        <div class="alert alert-primary container-fluid" style="width: 50%;direction: rtl">
            <?php echo e($title); ?>

        </div>

        
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

        
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="display: flex;justify-content: space-between">

                    <button style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن کاربر جدید</button>
                    <h2 class="az-content-title">کاربران </h2>
                </div>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">شماره تماس</th>
                        <th class="wd-15p">سن</th>
                        <th class="wd-20p">جنسیت</th>
                        <th class="wd-10p">عنوان</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($users) > 0): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>
                                    <button class="btn btn-primary btn-rounded">بخش ها</button>
                                    <button class="btn btn-warning btn-rounded">ویرایش</button>
                                    <button class="btn btn-danger btn-rounded">حذف</button>
                                </td>
                                <td><?php echo e($user->phone); ?></td>
                                <td><?php echo e((\Carbon\Carbon::now())->diffInYears($user->date_of_birth)); ?></td>
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
                        <th class="wd-15p">پزشک معالج</th>
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
                                <td><?php echo e($medicine->visit()->first()->doctor()->first()->user()->first()->name.' '.$medicine->visit()->first()->doctor()->first()->user()->first()->family); ?></td>
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

        
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='<?php echo e(route('sections.create')); ?>'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن بخش جدید</button>
                    <h2 class="az-content-title"> بخش ها   <?php if(isset($description)): ?> ( <?php echo e($description); ?> ) <?php endif; ?>  </h2>
                </div>


                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">عملیات کارمند</th>
                        <th class="wd-15p">تعداد پزشک</th>
                        <th class="wd-20p">تعداد تخت</th>
                        <th class="wd-10p">بیمارستان مربوطه</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($sections) > 0): ?>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>
                                    <button onclick="window.location='<?php echo e(route('section_doctors', ['section_id'=>$section->id])); ?>'" class="btn btn-primary btn-rounded">پزشکان </button>
                                    <button onclick="window.location='<?php echo e(route('section_employees', ['section_id'=>$section->id])); ?>'" class="btn btn-success btn-rounded">پرسنل</button>
                                    <button onclick="window.location='<?php echo e(route('sections.edit', ['section'=>$section])); ?>'" class="btn btn-warning btn-rounded">ویرایش</button>
                                    <form method="post" action="<?php echo e(route('sections.destroy', ['section'=>$section])); ?>" style="display: inline;"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="btn btn-danger btn-rounded">حذف</button></form>
                                </td>
                                <td><?php echo e(count($section->employees()->get())); ?></td>
                                <td><?php echo e(count($section->doctors()->get())); ?></td>
                                <td><?php echo e($section->number_of_bed); ?></td>
                                <td><?php echo e($section->clinic()->first() != null ? $section->clinic()->first()->name : ''); ?></td>
                                <td><?php echo e($section->name); ?></td>
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
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/search.blade.php ENDPATH**/ ?>