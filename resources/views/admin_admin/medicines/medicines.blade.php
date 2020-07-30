@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right">

                    <h2 class="az-content-title"> دارو ها   @if(isset($description))   ( {{ $description }} ) @endif  </h2>
                </div>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        {{--<th class="wd-15p">عملیات ها</th>--}}
                        <th class="wd-15p">زمان ویزیت</th>
                        <th class="wd-15p">بیمار</th>
                        {{-- <th class="wd-15p">پزشک معالج</th> --}}
                        <th class="wd-20p">شیوه مصرف</th>
                        <th class="wd-10p">مقدار</th>
                        <th class="wd-25p">نام دارو</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($medicines) > 0)
                        @foreach($medicines as $medicine)
                            <tr>

                                {{--<td>--}}
                                    {{--<button class="btn btn-primary btn-rounded">حقوق ها</button>--}}
                                    {{--<button class="btn btn-warning btn-rounded">ویرایش</button>--}}
                                    {{--<button class="btn btn-danger btn-rounded">حذف</button>--}}
                                {{--</td>--}}

                                <td>{{ \Hekmatinasser\Verta\Verta::instance($medicine->visit()->first()->created_at)->format('Y-n-j')  }}</td>
                                <td>{{ $medicine->visit()->first()->patient()->first()->user()->first()->name.' '.$medicine->visit()->first()->patient()->first()->user()->first()->family }}</td>
                                {{-- <td>{{ $medicine->visit()->first()->doctor()->first()->user()->first()->name.' '.$medicine->visit()->first()->doctor()->first()->user()->first()->family }}</td> --}}
                                <td>{{ \Illuminate\Support\Str::limit($medicine->instruction,25 ) }}</td>
                                <td>{{ $medicine->amount }}</td>
                                <td>{{ $medicine->name }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-primary">
                            هیچ دارویی ثبت نشده است.
                        </div>
                    @endif
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection
