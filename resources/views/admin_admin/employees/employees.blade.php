@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='{{ route('employees.create') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن کادر درمانی جدید</button>
                    <h2 class="az-content-title"> کادر درمانی ها   @if(isset($description))   ( {{ $description }} ) @endif  </h2>
                </div>

                @include('admin_admin.messages')



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        @if (auth()->user()->hasRole('admin') ||auth()->user()->hasRole('hospital_admin'))
                            <th class="wd-15p">عملیات ها</th>
                        @endif
                        <th class="wd-15p">شماره تماس</th>
                        <th class="wd-15p">جنسیت</th>
                        <th class="wd-15p">بخش خدمت</th>
                        <th class="wd-15p">تعداد فرزند</th>
                        <th class="wd-20p">مدرک</th>
                        <th class="wd-10p">عنوان</th>
                        <th class="wd-25p">نام کامل</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($employees) > 0)
                        @foreach($employees as $employee)
                            <tr>

                                @if (auth()->user()->hasRole('admin') ||auth()->user()->hasRole('hospital_admin'))
                                    <td>
                                        <button onclick="window.location='{{ route('employee_salary', ['employee_id'=>$employee->id]) }}'" class="btn btn-primary btn-rounded">حقوق ها</button>
                                        <button onclick="window.location='{{ route('employees.edit', ['employee'=>$employee]) }}'" class="btn btn-warning btn-rounded">ویرایش</button>
                                        <form method="post" action="{{ route('employees.destroy', ['employee'=>$employee]) }}" style="display: inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger btn-rounded">حذف</button></form>
                                    </td>
                                @endif

                                <td>{{ $employee->user()->first()->phone }}</td>
                                <td>{{ checkGender($employee->user()->first()->sex) }}</td>
                                <td>{{ $employee->section()->first() != null ? $employee->section()->first()->name : '---' }}</td>
                                <td>{{ $employee->number_of_child }}</td>
                                <td>{{ $employee->degree }}</td>
                                <td>{{ $employee->type }}</td>
                                <td>{{ $employee->user()->first()->name.' '.$employee->user()->first()->family }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-primary">
                            هیچ کادر درمانی ثبت نشده است.
                        </div>
                    @endif
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection
