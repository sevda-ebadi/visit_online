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
        <a href="#" style="height: initial; font-family: iransansmedium;text-align: right" class="az-logo">@lang('auth.app.name')</a>
        <div class="az-signin-header">

            @include('admin_admin.messages')
            <form method="post" action="{{ route('auth.two.factor.activate') }}">
                @csrf

            <h2>فعال سازی احراز هویت دو مرحله ای</h2>
            <div>
                <p>قابلیت احراز هویت دو مرحله ای برای شما غیر فعال است.برای فعال سازی احراز هویت دو مرحله ای با شماره تماس</p>
                <span class="badge badge-primary"><a style="color: white;font-size: 20px" href="#">{{ auth()->user()->phone }}</a></span>
                <p>دکمه فعال سازی را کلیک کنید</p>
            </div>

                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6Le036IZAAAAAPIuX-EGvGg82lcX1DbIygTc4Oe1"></div>
                </div><!-- form-group -->

                <button type="submit" class="btn btn-az-primary btn-block">فعال سازی</button>
            </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
            <p>بازگشت به <a href="{{ route('clinics.index') }}">خانه</a></p>
        </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
</div><!-- az-signin-wrapper -->

@include('admin_admin.layout.footer_script')
<script src="https://www.google.com/recaptcha/api.js?hl=fa"></script>


</body>
</html>
