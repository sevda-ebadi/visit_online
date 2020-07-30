@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right">

                    <h2 class="az-content-title">بیماران </h2>
                </div>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">شماره تماس</th>
                        <th class="wd-15p">تعداد ویزیت</th>
                        <th class="wd-20p">وزن</th>
                        <th class="wd-10p">قد</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($patients) > 0)
                        @foreach($patients as $patient)
                            <tr>

                                <td>
                                    <button onclick="window.location='{{ route('patient_visits', ['patient_id'=>$patient->id]) }}'" class="btn btn-success btn-rounded">ویزیت ها</button>
                                    <button class="btn btn-warning btn-rounded">ویرایش</button>
                                    <button class="btn btn-danger btn-rounded">حذف</button>
                                </td>

                                <td>{{ $patient->user()->first()->phone }}</td>
                                <td>{{ count($patient->visits()->get()) }}</td>
                                <td>{{ $patient->weight }}</td>
                                <td>{{ $patient->height }}</td>
                                <td>{{ $patient->user()->first()->name.' '.$patient->user()->first()->family }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-primary">
                            هیچ مراجعه کننده ای ثبت نشده است.
                        </div>
                    @endif
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection