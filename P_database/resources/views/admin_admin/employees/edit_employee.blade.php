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
            <form method="post" action="{{ route('employees.update', ['employee'=>$employee]) }}" class="az-content-body">
                @csrf
                @method('PUT')
                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='{{ route('employees.index') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">بازگشت به لیست کادر درمانی ها</button>
                    <h2 class="az-content-title"> ویرایش کادر درمانی {{ $employee->user()->first()->name.' '.$employee->user()->first()->family }} </h2>
                </div>


                @include('admin_admin.messages')

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام</p>
                        <input value="{{ $employee->user()->first()->name }}" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام خانوادگی</p>
                        <input value="{{ $employee->user()->first()->family }}" name="family" style="text-align: right" class="form-control" placeholder="نام خانوادگی" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">تعداد فرزند</p>
                        <input value="{{ $employee->number_of_child }}" name="number_of_child" style="text-align: right" class="form-control" placeholder="تعداد فرزند" type="number">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">مدرک</p>
                        <input value="{{ $employee->degree }}" name="degree" style="text-align: right" class="form-control" placeholder="مدرک" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">شماره تماس</p>
                        <input value="{{ $employee->user()->first()->phone }}" name="phone" style="text-align: right" class="form-control" placeholder="شماره تماس" type="text">
                    </div><!-- col -->
                </div><!-- row -->


                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام بخش</p>
                        <select name="section_id" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            @if(count($sections) > 0)
                                @foreach($sections as $section)
                                    <option @if($employee->section_id == $section->id) selected @endif style="text-align: right;" value="{{ $section->id }}">{{ $section->name }} ( {{ $section->clinic()->first() != null ? $section->clinic()->first()->name : '---' }} )</option>
                                @endforeach
                            @endif
                        </select>
                    </div><!-- col-4 -->
                </div><!-- row -->


                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">وضعیت تاهل</p>
                        <select name="marriage" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            <option @if($employee->marriage == 0) selected @endif value="0">متاهل</option>
                            <option @if($employee->marriage == 1) selected @endif value="1">مجرد</option>
                        </select>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">جنسیت </p>
                        <select name="sex" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            <option @if($employee->user()->first()->sex == 0) selected @endif value="0">زن</option>
                            <option @if($employee->user()->first()->sex == 1) selected @endif value="1">مرد</option>
                        </select>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">عنوان </p>
                        <select name="type" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            <option @if($employee->type == 'پرستار') selected @endif value="0">پرستار</option>
                            <option @if($employee->type == 'ماما') selected @endif value="1">ماما</option>
                            <option @if($employee->type == 'آشپز') selected @endif value="2">آشپز</option>
                            <option @if($employee->type == 'نگهبان') selected @endif value="3">نگهبان</option>
                            <option @if($employee->type == 'اورژانس') selected @endif value="4">اورژانس</option>
                            <option @if($employee->type == 'راننده') selected @endif value="5">راننده</option>
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

