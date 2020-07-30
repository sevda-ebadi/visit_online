<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div dir="rtl" style="display: flex;justify-content: space-between">
                    <?php if(auth()->user()->hasRole('admin') ||auth()->user()->hasRole('hospital_admin')): ?>
                        <button onclick="window.location='<?php echo e(route('sections.create')); ?>'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن بخش جدید</button>
                    <?php endif; ?>
                    <h2 class="az-content-title"> بخش ها   <?php if(isset($description)): ?> ( <?php echo e($description); ?> ) <?php endif; ?>  </h2>
                </div>


                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <?php if(auth()->user()->hasRole('admin') ||auth()->user()->hasRole('hospital_admin')): ?>
                            <th class="wd-15p">عملیات ها</th>
                        <?php endif; ?>
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
                                <?php if(auth()->user()->hasRole('admin') ||auth()->user()->hasRole('hospital_admin')): ?>
                                <td>
                                    <button onclick="window.location='<?php echo e(route('section_doctors', ['section_id'=>$section->id])); ?>'" class="btn btn-primary btn-rounded">پزشکان </button>
                                    <button onclick="window.location='<?php echo e(route('section_employees', ['section_id'=>$section->id])); ?>'" class="btn btn-success btn-rounded">پرسنل</button>
                                    <button onclick="window.location='<?php echo e(route('sections.edit', ['section'=>$section])); ?>'" class="btn btn-warning btn-rounded">ویرایش</button>
                                    <form method="post" action="<?php echo e(route('sections.destroy', ['section'=>$section])); ?>" style="display: inline;"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="btn btn-danger btn-rounded">حذف</button></form>
                                </td>
                                <?php endif; ?>
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

<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sevda\Desktop\visit_online\resources\views/admin_admin/sections/sections.blade.php ENDPATH**/ ?>