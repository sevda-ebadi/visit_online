<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul style="text-align: right;direction: rtl">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

<?php endif; ?>



<?php if(session()->has('success_message')): ?>
    <div class="alert <?php if(session()->has('type_message')): ?> <?php echo e(session()->get('type_message')); ?> <?php else: ?> alert-success  <?php endif; ?>">
        <?php echo e(session()->get('success_message')); ?>

    </div>
<?php endif; ?>


<?php /**PATH C:\Users\sevda\Desktop\SevdaEbadi_946127039\visit_online\resources\views/admin_admin/messages.blade.php ENDPATH**/ ?>