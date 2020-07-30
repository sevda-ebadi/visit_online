@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right">

                    {{--<button style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن کادر درمانی جدید</button>--}}
                    <h2 class="az-content-title"> حقوق ها   @if(isset($description)) ( {{ $description }} ) @endif  </h2>
                </div>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        {{--<th class="wd-15p">عملیات ها</th>--}}
                        <th class="wd-15p">حقوق کامل</th>
                        <th class="wd-15p">سال</th>
                        <th class="wd-15p">ماه</th>
                        <th class="wd-20p">حقوق پایه</th>
                        <th class="wd-10p">شغل</th>
                        <th class="wd-25p">نام فرد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($salaries) > 0)
                        @foreach($salaries as $salary)
                            <tr>

                                {{--<td>--}}
                                    {{--<button class="btn btn-primary btn-rounded">حقوق ها</button>--}}
                                    {{--<button class="btn btn-warning btn-rounded">ویرایش</button>--}}
                                    {{--<button class="btn btn-danger btn-rounded">حذف</button>--}}
                                {{--</td>--}}
                                <td> تومان {{ $salary->child_allowance + $salary->reward + $salary->base_salary }}</td>
                                <td>  {{ $salary->year }}</td>
                                <td>  {{ $salary->month }}</td>
                                <td> تومان {{ $salary->base_salary }}</td>
                                <td>{{ $salary->have_salary()->first()->field != null ? $salary->have_salary()->first()->field : $salary->have_salary()->first()->type }}</td>
                                <td>{{ $salary->have_salary()->first()->user()->first()->name.' '.$salary->have_salary()->first()->user()->first()->family }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-primary">
                            هیچ حقوقی ثبت نشده است.
                        </div>
                    @endif
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection