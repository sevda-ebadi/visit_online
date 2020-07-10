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
    <div class="az-card-signin" style="min-height: 700px;height: 95%;">
        <a href="#" style="font-family: iransansmedium;text-align: right" class="az-logo"><?php echo app('translator')->get('auth.logo.name'); ?></a>
        <div class="az-signin-header">

            <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <h2>ثبت نام</h2>


            <form method="post" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>نام</label>
                    <input type="text" class="form-control" name="name" placeholder="نام کامل خود را بنویسید" value="<?php echo e(old('name')); ?>">
                </div><!-- form-group -->
                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="text" class="form-control" name="email" placeholder="ایمیل خود را وارد کنید" value="<?php echo e(old('email')); ?>">
                </div><!-- form-group -->
                <div class="form-group">
                    <label>تلفن همراه</label>
                    <input type="text" class="form-control" name="phone" placeholder="شماره تماس خود را وارد کنید" value="<?php echo e(old('phone')); ?>">
                </div><!-- form-group -->
                <div class="form-group">
                    <label>رمز عبور</label>
                    <input type="password" class="form-control" name="password" placeholder="رمز عبور خود را وارد کنید">
                </div><!-- form-group -->

                <div class="form-group">
                    <label>تکرار رمز عبور</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="تکرار رمز عبور خود را وارد کنید">
                </div><!-- form-group -->

                <button type="submit" class="btn btn-az-primary btn-block">ثبت نام</button>
            </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
            <p>ثبت نام کرده اید؟<a href="<?php echo e(route('login')); ?>">ورود</a></p>

            <div style="text-align: center;">
                <button onclick="window.location='<?php echo e(route('social_login', ['provider'=>'google'])); ?>'" class="btn btn btn-outline-indigo">ثبت نام با گوگل</button>
                <button onclick="window.location='<?php echo e(route('social_login', ['provider'=>'github'])); ?>'" class="btn btn btn-outline-indigo">ثبت نام با گیت هاب</button>
            </div>
        </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
</div><!-- az-signin-wrapper -->

<?php echo $__env->make('admin_admin.layout.footer_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/register.blade.php ENDPATH**/ ?>