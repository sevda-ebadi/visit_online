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
            <form method="post" action="{{ route('sections.update', ['section'=>$section]) }}" class="az-content-body">
                @csrf
                @method('PUT')
                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='{{ route('sections.index') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">بازگشت به لیست بخش ها</button>
                    <h2 class="az-content-title"> ویرایش بخش {{ $section->name }} </h2>
                </div>


                @include('admin_admin.messages')

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام بخش</p>
                        <input value="{{ $section->name }}" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">تعداد تخت</p>
                        <input value="{{ $section->number_of_bed }}" name="number_of_bed" style="text-align: right" class="form-control" placeholder="تعداد تخت" type="number">
                    </div><!-- col -->
                </div><!-- row -->


                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام کلینیک</p>
                        <select name="clinic_id" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            @if(count($clinics) > 0)
                                @foreach($clinics as $clinic)
                                    <option @if($section->clinic_id == $clinic->id) selected @endif style="text-align: right;" value="{{ $clinic->id }}">{{ $clinic->name }} ( {{ $clinic->address }} )</option>
                                @endforeach
                            @endif
                        </select>
                    </div><!-- col-4 -->
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

