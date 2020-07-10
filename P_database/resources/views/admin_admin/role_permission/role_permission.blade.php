@extends('admin_admin.layout.template')

@section('custom_style')

@endsection

@section('body')
    <div class="az-content">
        <div class="container">
            <form method="post" action="{{ route('edit_role_permission', ['user'=>$user]) }}" class="az-content-body">
                @csrf
                <div style="text-align: right">

                    <h2 class="az-content-title"> نقش و دسترسی های کاربر {{ $user->name.' '.$user->family }}</h2>
                </div>


                @include('admin_admin.messages')

                <div class="row row-sm mg-b-20">
                    <div style="text-align: right" class="col-lg">
                        <p style="text-align: right;">نقش ها</p>

                        @forelse($roles as $role)
                            <span style="direction: rtl" class="col-2">
                                <input name="roles[]" {{ $user->roles->contains($role) ? 'checked' : ''}} value="{{ $role->name }}" id="{{ 'role'.$role->id }}" type="checkbox">
                                <label for="{{ 'role'.$role->id }}">{{ $role->persian_name }}</label>
                            </span>
                        @empty
                            <div class="alert alert-warning">هیچ نقشی ثبت نشده است</div>
                        @endforelse

                    </div><!-- col -->
                </div><!-- row -->

                <hr>

                <div class="row row-sm mg-b-20">
                    <div style="text-align: right" class="col-lg">
                        <p style="text-align: right;">دسترسی ها</p>

                        @forelse($permissions as $permission)
                            <span style="direction: rtl" class="col-2">
                                <input name="permissions[]" {{ $user->permissions->contains($permission) ? 'checked' : ''}} value="{{ $permission->name }}" id="{{ 'permission'.$permission->id }}" type="checkbox">
                                <label for="{{ 'permission'.$permission->id }}">{{ $permission->persian_name }}</label>
                            </span>
                        @empty
                            <div class="alert alert-warning">هیچ دسترسی ثبت نشده است</div>
                        @endforelse

                    </div><!-- col -->
                </div><!-- row -->



                <div class="row row-sm">
                    <div class="col-lg">
                        <button type="submit" class="btn btn-primary">ثبت </button>
                    </div><!-- col -->
                </div>

            </form><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection

