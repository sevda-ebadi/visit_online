@extends('admin_admin.layout.template')

@section('custom_style')

@endsection

@section('body')
    <div class="az-content">
        <div class="container">
            <form method="post" action="{{ route('roles.store') }}" class="az-content-body">
                @csrf
                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='{{ route('roles.index') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">بازگشت به لیست نقش ها</button>
                    <h2 class="az-content-title"> ثبت نقش جدید </h2>
                </div>


                @include('admin_admin.messages')

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام نقش</p>
                        <input value="{{ old('name') }}" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                        @if($errors->has('name'))
                            <small style="text-align: right" class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام فارسی نقش</p>
                        <input value="{{ old('persian_name') }}" name="persian_name" style="text-align: right" class="form-control" placeholder="نام فارسی" type="text">
                        @if($errors->has('persian_name'))
                            <small style="text-align: right" class="form-text text-danger">{{ $errors->first('persian_name') }}</small>
                        @endif
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

