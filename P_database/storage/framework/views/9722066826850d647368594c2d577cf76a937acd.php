<!DOCTYPE html>
<html lang="fa">

<head>


    <link rel="icon" href="<?php echo e(asset('logo.png')); ?>">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo app('translator')->get('auth.app.name'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <?php echo $__env->make('admin_admin.layout.style_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
    <style>
        @font-face {
            font-family: iransanslight;
            src: url(<?php echo e(asset('fonts/iransans/IRANSans_Light.ttf')); ?>);
        }

        @font-face {
            font-family: iransansmedium;
            src: url(<?php echo e(asset('fonts/iransans/IRANSans_Medium.ttf')); ?>);
        }

        * {
            font-family: iransanslight;
        }

        #datatable2_length, #datatable2_info {
            display: none;
        }

    </style>



    <?php echo $__env->yieldContent('custom_style'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php echo $__env->make('admin_admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('body'); ?>

    <?php echo $__env->make('admin_admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin_admin.layout.footer_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('custom_script'); ?>


</div>
</body>
</html>

<?php /**PATH C:\Users\hamid\Desktop\hamidreza_ghanbari_956127026\P_database\resources\views/admin_admin/layout/template.blade.php ENDPATH**/ ?>