@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='{{ route('doctors.create') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن پزشک </button>
                    <!-- <h2 class="az-content-title"> دکتر ها   @if(isset($description)) ( {{ $description }}   ) @endif  </h2> -->
                </div>


                @include('admin_admin.messages')

                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                    @role('admin')
                        <th class="wd-15p">عملیات ها</th>
                     @endrole
                        <th class="wd-15p">شماره تماس</th>
                        <th class="wd-15p">جنسیت</th>
                        <th class="wd-15p">سن</th>
                        <th class="wd-15p">تعداد فرزند</th>
                        <th class="wd-20p">مدرک</th>
                        <th class="wd-10p">تخصص</th>
                        <th class="wd-25p">نام کامل</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($doctors) > 0)
                        @foreach($doctors as $doctor)
                            <tr>

                                {{--<td>
                                   @role('admin')

                                    <button onclick="window.location='{{ route('doctor_salary', ['doctor_id'=>$doctor->id]) }}'" class="btn btn-primary btn-rounded">حقوق ها</button>
                                    <button onclick="window.location='{{ route('doctors.edit', ['doctor'=>$doctor]) }}'" class="btn btn-warning btn-rounded">ویرایش</button>
                                    <form method="post" action="{{ route('doctors.destroy', ['doctor'=>$doctor]) }}" style="display: inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger btn-rounded">حذف</button></form>


                                    @endrole

                                </td>--}}

                                <td>{{ $doctor->user()->first()->phone }}</td>
                                <td>{{ checkGender($doctor->user()->first()->sex) }}</td>
                                <td>{{ ((\Carbon\Carbon::now())->diffInYears($doctor->user()->first()->date_of_birth) != 0) ? (\Carbon\Carbon::now())->diffInYears($doctor->user()->first()->date_of_birth)  : '----' }}</td>
                                <td>{{ $doctor->number_of_child }}</td>
                                <td>{{ $doctor->degree }}</td>
                                <td>{{ $doctor->field }}</td>
                                <td>{{ $doctor->user()->first()->name.' '.$doctor->user()->first()->family }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-primary">
                            هیچ پزشکان ثبت نشده است.
                        </div>
                    @endif
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection
