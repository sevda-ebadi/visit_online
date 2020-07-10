@extends('admin_admin.layout.template')

@section('custom_style')
    <style>
        .select2-results__option {
            text-align: right;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('baba_khani/persian-datepicker.css') }}"/>
@endsection

@section('body')
    <div class="az-content">
        <div class="container">
            <form method="post" action="{{ route('store_visit') }}" class="az-content-body">
                @csrf
                <div style="text-align: right">

                    {{--<button onclick="window.location='{{ route('doctors.index') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">بازگشت به لیست پزشکان ها</button>--}}
                    <h2 class="az-content-title"> ثبت ویزیت جدید </h2>
                </div>


                @include('admin_admin.messages')

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام</p>
                        <input disabled value="{{ auth()->user()->name  }}" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام خانوادگی</p>
                        <input disabled value="{{ auth()->user()->family }}" name="family" style="text-align: right" class="form-control" placeholder="نام خانوادگی" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام پزشک معالج</p>
                        <input disabled value="{{ $doctor->user()->first()->name.' '.$doctor->user()->first()->family  }}" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <input type="hidden" value="{{ $doctor->id }}" name="doctor_id" />

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">تاریخ</p>
                        <input name="date" type="text" class="example1" />
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">ساعت</p>
                        <input type="text" class="only-timepicker-example" name="time">
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

@section('custom_script')
    <script src="{{ asset('baba_khani/persian-date.js') }}"></script>
    <script src="{{ asset('baba_khani/persian-datepicker.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".example1").persianDatepicker({
                format: 'YYYY/MM/DD'
            });
        });

        $('.only-timepicker-example').persianDatepicker({
            onlyTimePicker: true,
            format: 'h-m'
        });
    </script>


@endsection

