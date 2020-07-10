@extends('admin_admin.layout.template')

@section('custom_style')

@endsection

@section('body')
    <div class="az-content">
        <div class="container">
            <form method="post"  action="{{ route('clinics.update', ['clinic'=>$clinic]) }}" class="az-content-body">
                @csrf
                @method('PUT')
                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='{{ route('clinics.index') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">بازگشت به لیست کلینیک ها</button>
                    <h2 class="az-content-title"> ویرایش  {{ $clinic->name }} </h2>
                </div>


                @include('admin_admin.messages')

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام بیمارستان</p>
                        <input value="{{ $clinic->name }}" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">آدرس بیمارستان</p>
                        <textarea name="address" style="text-align: right" rows="3" class="form-control" placeholder="ادرس">{{ $clinic->address }}</textarea>
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

