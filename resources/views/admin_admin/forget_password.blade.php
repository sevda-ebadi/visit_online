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
    <div class="az-card-signin" style="min-height: 300px ; max-height: 400px;">
        <a href="#" style="height: initial; font-family: iransansmedium;text-align: right" class="az-logo">@lang('auth.logo.name')</a>
        <div class="az-signin-header">

            @include('admin_admin.messages')

            <h2>فراموشی رمز عبور</h2>


            <form action="{{ route('send_reset_link') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="text" name="email" class="form-control" placeholder="ایمیل خود را وارد کنید" value="{{ old('email') }}">
                </div><!-- form-group -->

                <button class="btn btn-az-primary btn-block">ارسال لینک فراموشی رمز عبور</button>
            </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
            <p>بازگشت به <a href="{{ url('/') }}">خانه</a></p>

        </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
</div><!-- az-signin-wrapper -->

@include('admin_admin.layout.footer_script')
</body>
</html>
