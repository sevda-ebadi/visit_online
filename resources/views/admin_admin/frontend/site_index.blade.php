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
            <h1 class="title">بیمارستان ها</h1>
            <p class="title-text">به بخش بیمارستان ها و کلینک ها خوش آمدید</p>

            <div class="row">

                @if(count($clinics) > 0)
                    @foreach($clinics as $clinic)
                        <div style="direction: rtl" class="col-sm-6 col-lg-4 mg-t-40 mg-b-40 mg-sm-t-0">
                            <div class="card">
                                <figure >
                                    <div><img src="{{ asset('frontend_images/hospital_image.png') }}" class="img-fluid" alt=""></div>

                                    @if(count($clinic->sections()->get()) > 0)

                                    <figcaption>
                                        <a href="{{ route('site_sections', ['clinic_id'=>$clinic->id]) }}" class="btn btn-primary">مشاهده بخش ها</a>
                                    </figcaption>

                                    @else
                                        <figcaption>
                                            <button disabled class="btn btn-danger" >فاقد بخش</button>
                                        </figcaption>

                                    @endif
                                </figure>
                            </div>
                            <label class="az-content-label pt-3 pb-3">{{ $clinic->name }}</label>
                            <h6 class="az-content-title">{{ \Illuminate\Support\Str::limit($clinic->address, 25) }}</h6>
                        </div><!-- col -->
                    @endforeach
                @else
                    <div style="text-align: right;direction: rtl" class="alert alert-primary row container-fluid">
                        هیچ بیمارستانی ثبت نشده است
                    </div>
                @endif


                {!! $clinics->render() !!}





            </div><!-- row -->
        </div><!-- container-fluid -->
    </div><!-- az-content -->
@endsection