<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="<?php echo e(asset('logo.png')); ?>">
    <meta name="theme-color" content="#4285f4" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <title><?php echo app('translator')->get('auth.app.name'); ?></title>

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

    </style>

</head>
<body class="az-body">


<div class="az-error-wrapper">

    

    


    
    <pre style="font-family: iransansmedium" class="alert alert-warning">
                توجه : این یک پروژه دانشجویی است .(تمام اطلاعات این سایت داده فیک است)

                ادمین : admin@demo.com, password: 123456789

                پزشک : secretary@demo.com, password: 123456789

            بیمار : patient@demo.com, password: 123456789

            رییس بیمارستان : hospital_admin@demo.com, password: 123456789
    </pre>
    

    <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <img style="margin-bottom: 10px;" src="<?php echo e(asset('logo.png')); ?>"/>



    <h2 style="font-family: iransansmedium"><?php echo app('translator')->get('auth.app.name'); ?></h2>
    <h3>پروژه مطب پزشک</h3>
    <h6><?php echo app('translator')->get('auth.author.name'); ?></h6>

    <div>
        <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-indigo">ثبت نام</a>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-indigo">ورود</a>
    </div>
</div>


<?php echo $__env->make('admin_admin.layout.footer_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>
</html>
<?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/index.blade.php ENDPATH**/ ?>