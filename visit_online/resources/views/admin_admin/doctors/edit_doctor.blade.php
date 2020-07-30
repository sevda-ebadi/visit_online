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
            <form method="post" action="{{ route('doctors.update', ['doctor'=>$doctor]) }}" class="az-content-body">
                @csrf
                @method('PUT')
                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='{{ route('doctors.index') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">بازگشت به لیست پزشکان ها</button>
                    <h2 class="az-content-title"> ویرایش پزشک {{ $doctor->user()->first()->name.' '.$doctor->user()->first()->family }} </h2>
                </div>


                @include('admin_admin.messages')

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام</p>
                        <input value="{{ $doctor->user()->first()->name }}" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام خانوادگی</p>
                        <input value="{{ $doctor->user()->first()->family }}" name="family" style="text-align: right" class="form-control" placeholder="نام خانوادگی" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">تعداد فرزند</p>
                        <input value="{{ $doctor->number_of_child }}" name="number_of_child" style="text-align: right" class="form-control" placeholder="تعداد فرزند" type="number">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">مدرک</p>
                        <input value="{{ $doctor->degree }}" name="degree" style="text-align: right" class="form-control" placeholder="مدرک" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">تخصص</p>
                        <input value="{{ $doctor->field }}" name="field" style="text-align: right" class="form-control" placeholder="تخصص" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">شماره تماس</p>
                        <input value="{{ $doctor->user()->first()->phone }}" name="phone" style="text-align: right" class="form-control" placeholder="شماره تماس" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                {{--<div class="row row-sm mg-b-20">--}}
                    {{--<div class="col-lg">--}}
                        {{--<p style="text-align: right;">نام بخش</p>--}}
                        {{--<select name="section_id" class="form-control select2">--}}
                            {{--<option style="text-align: right" label="انتخاب کنید"></option>--}}
                            {{--@if(count($sections) > 0)--}}
                                {{--@foreach($sections as $section)--}}
                                    {{--<option @if($doctor->section_id == $section->id) selected @endif style="text-align: right;" value="{{ $section->id }}">{{ $section->name }} ( {{ $section->clinic()->first() != null ? $section->clinic()->first()->name : '---' }} )</option>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        {{--</select>--}}
                    {{--</div><!-- col-4 -->--}}
                {{--</div><!-- row -->--}}


                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">وضعیت تاهل</p>
                        <select name="marriage" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            <option @if($doctor->marriage == 0) selected @endif value="0">متاهل</option>
                            <option @if($doctor->marriage == 1) selected @endif value="1">مجرد</option>
                        </select>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">جنسیت </p>
                        <select name="sex" class="form-control select2">
                            <option style="text-align: right" label="انتخاب کنید"></option>
                            <option @if($doctor->user()->first()->sex == 0) selected @endif value="0">زن</option>
                            <option @if($doctor->user()->first()->sex == 1) selected @endif value="1">مرد</option>
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

