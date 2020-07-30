@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="display: flex;justify-content: space-between">

                    <button onclick="window.location='{{ route('roles.create') }}'" style="padding: 5px;margin-bottom: 20px" type="button" class="btn btn-outline-primary">افزودن نقش جدید</button>
                    <h2 class="az-content-title">نقش ها</h2>
                </div>
                @include('admin_admin.messages')



                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-20p">دسترسی ها</th>
                        <th class="wd-10p">عنوان</th>
                        <th class="wd-25p">نام</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>
                                <button onclick="window.location='{{ route('roles.edit', ['role'=>$role]) }}'" class="btn btn-warning btn-rounded">ویرایش</button>
                                {{--<button class="btn btn-danger btn-rounded">حذف</button>--}}
                            </td>

                            <td>
                                @forelse($role->permissions as $permission)
                                    <span class="badge badge-primary">{{ $permission->persian_name }}</span>
                                @empty
                                    <span class="badge badge-warning">بدون دسترسی</span>
                                @endforelse
                            </td>

                            <td>{{ $role->name }}</td>
                            <td>{{ $role->persian_name }}</td>
                        </tr>

                    @empty
                        <div class="alert alert-primary">
هیچ نقشی ثبت نشده است
                        </div>
                    @endforelse

                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection