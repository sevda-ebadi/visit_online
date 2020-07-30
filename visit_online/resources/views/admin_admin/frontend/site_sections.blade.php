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
            <h1 class="title">بخش ها</h1>
            <p class="title-text">به بخش های کلینیک خوش آمدید</p>

            <div class="row">

                @if(count($sections) > 0)
                    @foreach($sections as $section)
                        <div style="direction: rtl" class="col-sm-6 col-lg-4 mg-t-40 mg-b-40 mg-sm-t-0">
                            <div class="card">
                                <figure >
                                    <div><img src="{{ asset('frontend_images/section.png') }}" class="img-fluid" alt=""></div>
                                    @if(count($section->doctors()->get()) > 0)
                                        <figcaption>
                                            <a href="{{ route('site_doctors', ['section_id'=>$section->id]) }}" class="btn btn-primary">مشاهده پزشکان </a>
                                        </figcaption>
                                    @else
                                        <figcaption>
                                            <button disabled class="btn btn-danger" >فاقد پزشک</button>
                                        </figcaption>
                                    @endif
                                </figure>
                            </div>
                            <label class="az-content-label pt-3 pb-3">{{ $section->name }}</label>
                            <h6 class="az-content-title"> تخت {{ $section->number_of_bed  }}</h6>
                        </div><!-- col -->
                    @endforeach
                @else
                    <div style="text-align: right;direction: rtl" class="alert alert-primary row container-fluid">
                        هیچ بخش ای ثبت نشده است
                    </div>
                @endif


                {!! $sections->render() !!}





            </div><!-- row -->
        </div><!-- container-fluid -->
    </div><!-- az-content -->
@endsection