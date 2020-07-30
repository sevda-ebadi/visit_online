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
    <div class="az-card-signin" style="min-height: 700px;max-height: : 1100px;">
        <a href="#" style="font-family: iransansmedium;text-align: right" class="az-logo"> <?php echo app('translator')->get('auth.logo.name'); ?></a>
        <div class="az-signin-header">

            <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <h2>ورود</h2>


            <form action="<?php echo e(route('login')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="text" name="email" class="form-control" placeholder="ایمیل خود را وارد کنید" value="<?php echo e(old('email')); ?>">
                </div><!-- form-group -->
                <div class="form-group">
                    <label>رمز عبور</label>
                    <input type="password" name="password" class="form-control" placeholder="رمز عبور خود را وارد کنید">
                </div><!-- form-group -->

                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6Le036IZAAAAAPIuX-EGvGg82lcX1DbIygTc4Oe1"></div>
                </div><!-- form-group -->

                <div class="form-group">
                    <label>مرا به خاطر بسپار</label>
                    <input name="remember" type="checkbox" >
                </div><!-- form-group -->


                <button class="btn btn-az-primary btn-block">ورود</button>
            </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
            <p>هنوز ثبت نام نکرده اید؟<a href="<?php echo e(route('register')); ?>">ثبت نام</a></p>
            <p>میخاهید بدون رمز عبور لاگین کنید؟<a href="<?php echo e(route('magic_form')); ?>">ورود بدون رمز عبور</a></p>
            <p>رمز عبور خود را فراموش کرده اید؟<a href="<?php echo e(route('forget_form')); ?>">فراموشی رمز عبور</a></p>


           <div style="text-align: center;">
               <button onclick="window.location='<?php echo e(route('social_login', ['provider'=>'google'])); ?>'" class="btn btn btn-outline-indigo">ورود با گوگل</button>
               <button onclick="window.location='<?php echo e(route('social_login', ['provider'=>'github'])); ?>'" class="btn btn btn-outline-indigo">ورود با گیت هاب</button>
           </div>

        </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
</div><!-- az-signin-wrapper -->

    <?php echo $__env->make('admin_admin.layout.footer_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <script src="https://www.google.com/recaptcha/api.js?hl=fa"></script>
</body>
</html>
<?php /**PATH /Users/amirjani/Desktop/SevdaEbadi946127039/visit_online/resources/views/admin_admin/login.blade.php ENDPATH**/ ?>