@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='{{ route('clinics.create') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن بیمارستان جدید</button>
                    <h2 class="az-content-title">بیمارستان ها</h2>
                </div>


                @include('admin_admin.messages')



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">تعداد بخش</th>
                        <th class="wd-20p">تعداد تخت</th>
                        <th class="wd-10p">آدرس</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($clinics) > 0)
                        @foreach($clinics as $clinic)
                            <tr>

                                <td>
                                    <button onclick="window.location='{{ route('clinic_sections', ['clinic_id'=>$clinic->id]) }}'" class="btn btn-primary btn-rounded">بخش ها</button>
                                    <button onclick="window.location='{{ route('clinics.edit', ['clinic'=>$clinic]) }}'" class="btn btn-warning btn-rounded">ویرایش</button>
                                    <form method="post" action="{{ route('clinics.destroy', ['clinic'=>$clinic]) }}" style="display: inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger btn-rounded">حذف</button></form>
                                </td>
                                <td>{{ count($clinic->sections()->get()) }}</td>
                                <td>{{ ($clinic->sections()->sum('number_of_bed')) }}</td>
                                <td>{{ $clinic->address }}</td>
                                <td>{{ $clinic->name }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-primary">
                            هیچ کلینیک درمانی ثبت نشده است
                        </div>
                    @endif
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection