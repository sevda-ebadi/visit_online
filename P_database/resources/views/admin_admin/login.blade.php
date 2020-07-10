<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>@lang('auth.app.name')</title>

    @include('admin_admin.layout.style_head')
    <style>
        @font-face {
            font-family: iransanslight;
            src: url({{ asset('fonts/iransans/IRANSans_Light.ttf') }});
        }

        @font-face {
            font-family: iransansmedium;
            src: url({{ asset('fonts/iransans/IRANSans_Medium.ttf') }});
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
        <a href="#" style="font-family: iransansmedium;text-align: right" class="az-logo"> @lang('auth.logo.name')</a>
        <div class="az-signin-header">

            @include('admin_admin.messages')
            <h2>ورود</h2>


            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="text" name="email" class="form-control" placeholder="ایمیل خود را وارد کنید" value="{{ old('email') }}">
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
            <p>هنوز ثبت نام نکرده اید؟<a href="{{ route('register') }}">ثبت نام</a></p>
            <p>میخاهید بدون رمز عبور لاگین کنید؟<a href="{{ route('magic_form') }}">ورود بدون رمز عبور</a></p>
            <p>رمز عبور خود را فراموش کرده اید؟<a href="{{ route('forget_form') }}">فراموشی رمز عبور</a></p>


           <div style="text-align: center;">
               <button onclick="window.location='{{ route('social_login', ['provider'=>'google']) }}'" class="btn btn btn-outline-indigo">ورود با گوگل</button>
               <button onclick="window.location='{{ route('social_login', ['provider'=>'github']) }}'" class="btn btn btn-outline-indigo">ورود با گیت هاب</button>
           </div>

        </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
</div><!-- az-signin-wrapper -->

    @include('admin_admin.layout.footer_script')

    {{--for recaptcha script    --}}
    <script src="https://www.google.com/recaptcha/api.js?hl=fa"></script>
</body>
</html>
