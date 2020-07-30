@extends('admin_admin.layout.template')

@section('custom_style')
    <style>
        div.col-sm-6 > div > figure > div > img {
            width: 56%;
            height: 100%;
            object-fit: cover;
            text-align: center;
        }
        div.col-sm-6 > div > figure {
            height: 100%;
        }
        div.col-sm-6 > div > figure > div {
            height: 100%;
            display: flex;
            justify-content: center;
        }
        #azDemo > div:nth-child(1) {
            padding-top: 70px;
        }
    </style>
@endsection

@section('body')
    <div id="azDemo" class="az-content az-content-choose-demo">
        <div style="text-align: right;" class="container">
            {{--<label class="title-label">صفحه اول</label>--}}
            <h1 class="title">پزشک ها</h1>
            <p class="title-text">به بخش پزشکان خوش آمدید</p>

            <div class="row">

                @if(count($doctors) > 0)
                    @foreach($doctors as $doctor)
                        <div style="direction: rtl" class="col-sm-6 col-lg-4 mg-t-40 mg-b-40 mg-sm-t-0">
                            <div class="card">
                                <figure >
                                    <div><img src="{{ asset('frontend_images/doctor.png') }}" class="img-fluid" alt=""></div>
                                        <figcaption>
                                            <a href="{{ route('create_visit', ['doctor_id'=>$doctor->id]) }}" class="btn btn-primary" >گرفتن ویزیت</a>
                                        </figcaption>
                                </figure>
                            </div>
                            <label class="az-content-label pt-3 pb-3">{{ $doctor->user()->first()->name.' '.$doctor->user()->first()->family }}</label>
                            {{--<h6 class="az-content-title"> تخت {{ $doctor->number_of_bed  }}</h6>--}}
                        </div><!-- col -->
                    @endforeach
                @else
                    <div style="text-align: right;direction: rtl" class="alert alert-primary row container-fluid">
                        هیچ پزشک ای ثبت نشده است
                    </div>
                @endif


                {!! $doctors->render() !!}


            </div><!-- row -->
        </div><!-- container-fluid -->
    </div><!-- az-content -->
@endsection