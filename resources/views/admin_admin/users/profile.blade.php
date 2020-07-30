@extends('admin_admin.layout.template')

@section('custom_style')
    <style>
        .select2-results__option {
            text-align: right;
        }
    </style>
@endsection

@section('body')
    <div class="az-content">
        <div class="container">
            <form method="post" enctype="multipart/form-data" action="{{ route('submitProfile') }}" class="az-content-body">
                @csrf
                <div style="text-align: right">

                    <h2 class="az-content-title">ویرایش پروفایل کاربری</h2>

                </div>


                @include('admin_admin.messages')

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام</p>
                        <input value="{{ $user->name }}" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام خانوادگی</p>
                        <input value="{{ $user->family }}" name="family" style="text-align: right" class="form-control" placeholder="نام خانوادگی" type="text">
                    </div><!-- col -->
                </div><!-- row -->



                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">ایمیل</p>
                        <input value="{{ $user->email }}" name="email" style="text-align: right" class="form-control" placeholder="ایمیل" type="email">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">شماره تماس</p>
                        <input value="{{ $user->phone }}" name="phone" style="text-align: right" class="form-control" placeholder="شماره تماس" type="text">
                    </div><!-- col -->
                </div><!-- row -->


                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">جنسیت </p>
                        <select name="sex" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            <option @if($user->sex == 0) selected @endif value="0">زن</option>
                            <option @if($user->sex == 1) selected @endif value="1">مرد</option>
                        </select>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">تصویر آواتار</p>

                        <div style="display: flex;justify-content: space-between;">
                            <a href="" class="az-img-user"><img src="@if($user->avatar == null) {{ asset('frontend_images/user.png') }} @else {{ $user->avatar  }} @endif" alt=""></a>
                            <input  name="avatar" style="text-align: right;width: 80%;display:inline-block" class="form-control" placeholder="آواتار" type="file">

                        </div>




                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm">
                    <div class="col-lg">
                        <button type="submit" class="btn btn-primary">ثبت </button>
                    </div><!-- col -->
                </div>

            </form><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection

