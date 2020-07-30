@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right">

                    <h2 class="az-content-title">کاربران </h2>
                </div>
                @include('admin_admin.messages')



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">شماره تماس</th>
                        <th class="wd-15p">نقش ها</th>
                        <th class="wd-20p">جنسیت</th>
                        <th class="wd-10p">عنوان</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    <button onclick="window.location='{{ route('edit_role_permission_view', ['user'=>$user]) }}'" class="btn btn-primary btn-rounded">ویرایش نقش</button>
                                    <button onclick="window.location='{{ route('users.edit', ['user'=>$user]) }}'" class="btn btn-warning btn-rounded">ویرایش</button>
                                    <button class="btn btn-danger btn-rounded">حذف</button>
                                </td>
                                <td>{{ $user->phone }}</td>

                                <td>
                                    @forelse($user->roles as $role)
                                        <span class="badge badge-primary">{{ $role->persian_name }}</span>
                                    @empty
                                        <span class="badge badge-warning">بدون نقش</span>
                                    @endforelse
                                </td>

{{--                                <td>{{ (\Carbon\Carbon::now())->diffInYears($user->date_of_birth) }}</td>--}}
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

                            @empty
                                <div class="alert alert-primary">
                                    هیچ بخش درمانی ثبت نشده است.
                                </div>
                        @endforelse

                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection