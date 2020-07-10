@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">
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