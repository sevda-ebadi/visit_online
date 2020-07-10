<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
            text-align: right;
        }

    </style>
</head>
<body class="az-body">

<div class="az-signin-wrapper">
    <div class="az-card-signin" style="min-height: 500px;max-height: : 600px;">
        <a href="#" style="font-family: iransansmedium;text-align: right" class="az-logo"><?php echo app('translator')->get('auth.app.name'); ?></a>
        <div class="az-signin-header">

            <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <h2>ورود بدون رمز عبور</h2>


            <form action="<?php echo e(route('magic.send.token')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="text" name="email" class="form-control" placeholder="ایمیل خود را وارد کنید" value="<?php echo e(old('email')); ?>">
                </div><!-- form-group -->


                <button class="btn btn-az-primary btn-block">دریافت مجیک لینک</button>
            </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">

            <div style="text-align: center;">
                <button onclick="window.location='<?php echo e(route('login')); ?>'" class="btn btn btn-outline-indigo">ورود</button>
                <button onclick="window.location='<?php echo e(route('site_index')); ?>'" class="btn btn btn-outline-indigo">خانه</button>
                <button onclick="window.location='<?php echo e(route('register')); ?>'" class="btn btn btn-outline-indigo">ثبت نام</button>
            </div>

        </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
</div><!-- az-signin-wrapper -->

<?php echo $__env->make('admin_admin.layout.footer_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script src="https://www.google.com/recaptcha/api.js?hl=fa"></script>
</body>
</html>
<?php /**PATH C:\Users\hamid\Desktop\hamidreza_ghanbari_956127026\P_database\resources\views/admin_admin/magic/magic_form.blade.php ENDPATH**/ ?>