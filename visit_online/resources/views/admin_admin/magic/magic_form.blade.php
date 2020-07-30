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
    <div class="az-card-signin" style="min-height: 500px;max-height: : 600px;">
        <a href="#" style="font-family: iransansmedium;text-align: right" class="az-logo">@lang('auth.app.name')</a>
        <div class="az-signin-header">

            @include('admin_admin.messages')
            <h2>ورود بدون رمز عبور</h2>


            <form action="{{ route('magic.send.token') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="text" name="email" class="form-control" placeholder="ایمیل خود را وارد کنید" value="{{ old('email') }}">
                </div><!-- form-group -->


                <button class="btn btn-az-primary btn-block">دریافت مجیک لینک</button>
            </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">

            <div style="text-align: center;">
                <button onclick="window.location='{{ route('login') }}'" class="btn btn btn-outline-indigo">ورود</button>
                <button onclick="window.location='{{ route('site_index') }}'" class="btn btn btn-outline-indigo">خانه</button>
                <button onclick="window.location='{{ route('register') }}'" class="btn btn btn-outline-indigo">ثبت نام</button>
            </div>

        </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
</div><!-- az-signin-wrapper -->

@include('admin_admin.layout.footer_script')

{{--for recaptcha script    --}}
<script src="https://www.google.com/recaptcha/api.js?hl=fa"></script>
</body>
</html>
