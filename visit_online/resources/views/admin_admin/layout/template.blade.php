<!DOCTYPE html>
<html lang="fa">

<head>


    <link rel="icon" href="{{ asset('logo.png') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('auth.app.name')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    @include('admin_admin.layout.style_head')


    {{-- for font --}}
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
        }

        #datatable2_length, #datatable2_info {
            display: none;
        }

    </style>



    @yield('custom_style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('admin_admin.layout.header')

    @yield('body')

    @include('admin_admin.layout.footer')

    @include('admin_admin.layout.footer_script')

    @yield('custom_script')


</div>
</body>
</html>

