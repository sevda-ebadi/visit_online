@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">


        <div class="alert alert-primary container-fluid" style="width: 50%;direction: rtl">
            {{ $title }}
        </div>

        {{--clinics--}}
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

        {{--users--}}
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="display: flex;justify-content: space-between">

                    <button style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن کاربر جدید</button>
                    <h2 class="az-content-title">کاربران </h2>
                </div>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">شماره تماس</th>
                        <th class="wd-15p">سن</th>
                        <th class="wd-20p">جنسیت</th>
                        <th class="wd-10p">عنوان</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($users) > 0)
                        @foreach($users as $user)
                            <tr>

                                <td>
                                    <button class="btn btn-primary btn-rounded">بخش ها</button>
                                    <button class="btn btn-warning btn-rounded">ویرایش</button>
                                    <button class="btn btn-danger btn-rounded">حذف</button>
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ (\Carbon\Carbon::now())->diffInYears($user->date_of_birth) }}</td>
                                <td>{{ checkGender($user->sex) }}</td>
                                @if($user->doctor()->first() != null)
                                    <td>پزشک</td>
                                @else
                                    @if($user->patient()->first() != null)
                                        <td>بیمار</td>
                                    @else
                                        <td>{{ $user->employee()->first() == "" ? '----' : $user->employee()->first()->type }}</td>
                                    @endif
                                @endif
                                <td>{{ $user->name.' '.$user->family }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-primary">
                            هیچ بخش درمانی ثبت نشده است.
                        </div>
                    @endif
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>

        {{--medicines--}}
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right">

                    {{--<button style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن کادر درمانی جدید</button>--}}
                    <h2 class="az-content-title"> دارو ها   @if(isset($description))   ( {{ $description }} ) @endif  </h2>
                </div>



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        {{--<th class="wd-15p">عملیات ها</th>--}}
                        <th class="wd-15p">زمان ویزیت</th>
                        <th class="wd-15p">بیمار</th>
                        <th class="wd-15p">پزشک معالج</th>
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
                                <td>{{ $medicine->visit()->first()->doctor()->first()->user()->first()->name.' '.$medicine->visit()->first()->doctor()->first()->user()->first()->family }}</td>
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

        {{--sections--}}
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='{{ route('sections.create') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن بخش جدید</button>
                    <h2 class="az-content-title"> بخش ها   @if(isset($description)) ( {{ $description }} ) @endif  </h2>
                </div>


                @include('admin_admin.messages')


                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">عملیات کارمند</th>
                        <th class="wd-15p">تعداد پزشک</th>
                        <th class="wd-20p">تعداد تخت</th>
                        <th class="wd-10p">بیمارستان مربوطه</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($sections) > 0)
                        @foreach($sections as $section)
                            <tr>

                                <td>
                                    <button onclick="window.location='{{ route('section_doctors', ['section_id'=>$section->id]) }}'" class="btn btn-primary btn-rounded">پزشکان </button>
                                    <button onclick="window.location='{{ route('section_employees', ['section_id'=>$section->id]) }}'" class="btn btn-success btn-rounded">پرسنل</button>
                                    <button onclick="window.location='{{ route('sections.edit', ['section'=>$section]) }}'" class="btn btn-warning btn-rounded">ویرایش</button>
                                    <form method="post" action="{{ route('sections.destroy', ['section'=>$section]) }}" style="display: inline;">@csrf @method('DELETE')<button type="submit" class="btn btn-danger btn-rounded">حذف</button></form>
                                </td>
                                <td>{{ count($section->employees()->get()) }}</td>
                                <td>{{ count($section->doctors()->get()) }}</td>
                                <td>{{ $section->number_of_bed }}</td>
                                <td>{{ $section->clinic()->first() != null ? $section->clinic()->first()->name : '' }}</td>
                                <td>{{ $section->name }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-primary">
                            هیچ بخش درمانی ثبت نشده است.
                        </div>
                    @endif
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection