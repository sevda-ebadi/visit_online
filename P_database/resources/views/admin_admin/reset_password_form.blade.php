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
    <div class="az-card-signin" style="min-height: 500px ; max-height: 600px;">
        <a href="#" style="height: initial; font-family: iransansmedium;text-align: right" class="az-logo">@lang('auth.logo.name')</a>
        <div class="az-signin-header">

            @include('admin_admin.messages')

            <h2>فرم تغییر رمز عبور</h2>


            <form action="{{ route('send_reset_password') }}" method="post">
                @csrf

                <input name="token" type="hidden" value="{{ $token }}">

                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="text" name="email" class="form-control" readonly placeholder="ایمیل خود را وارد کنید" value="{{ $email }}">
                </div><!-- form-group -->

                <div class="form-group">
                    <label>رمز عبور</label>
                    <input type="password" class="form-control" name="password" placeholder="رمز عبور خود را وارد کنید">
                </div><!-- form-group -->

                <div class="form-group">
                    <label>تکرار رمز عبور</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="تکرار رمز عبور خود را وارد کنید">
                </div><!-- form-group -->

                <button class="btn btn-az-primary btn-block">تغییر رمز عبور</button>
            </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
{{--            <p>بازگشت به <a href="{{ url('/') }}">خانه</a></p>--}}

        </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
</div><!-- az-signin-wrapper -->

@include('admin_admin.layout.footer_script')
</body>
</html>
