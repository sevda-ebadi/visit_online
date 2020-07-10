<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="{{ route('clinics.index') }}" style="font-family: iransansmedium" class="az-logo">@lang('auth.logo.name')</a>
            <a href="" id="azNavShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <form method="post" action="{{ route('search') }}" class="az-header-center">
            @csrf
            <input name="word" type="search" class="form-control" placeholder="جستجو کنید ...">
            <button type="submit" class="btn"><i class="fas fa-search"></i></button>
        </form><!-- az-header-center -->
        <div class="az-header-right">



            {{--profile section--}}
            @auth
                <div class="dropdown az-profile-menu">
                        <a href="" class="az-img-user"><img src="@if(auth()->user()->avatar == null) {{ asset('frontend_images/user.png') }} @else {{ auth()->user()->avatar  }} @endif" alt=""></a>

                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>



                            <div class="az-header-profile">
                                <div class="az-img-user">
                                    <img src="@if(auth()->user()->avatar == null) {{ asset('frontend_images/user.png') }} @else {{ auth()->user()->avatar  }} @endif" alt="">
                                </div><!-- az-img-user -->
                                <h6>{{ auth()->user()->name.' '.auth()->user()->family }}</h6>
                                
                                {{--todo remove auth from bellow code--}}
                                @auth
                                    @forelse(auth()->user()->roles as $role)
                                        <span class="badge badge-primary">{{ $role->persian_name }}</span>
                                    @empty
                                        <span class="badge badge-warning">بدون نقش</span>
                                    @endforelse
                                @endauth
                            </div><!-- az-header-profile -->


                        @if(session()->has('mustVerifyEmail'))
                            <a style="direction: rtl"  href="{{ route('test') }}" class="dropdown-item badge badge-warning">
                                {{--<i class="typcn typcn-key"></i>--}}
                                @lang('auth.you must verify email')
                            </a>
                        @endif

                        @if(!auth()->user()->has_two_factor)
                            <a style="direction: rtl" href="{{ route('auth.two.factor.toggle') }}" class="dropdown-item"><i class="typcn typcn-user-outline"></i>اهراز هویت دو مرحله ای</a>
                        @endif
                        <a style="direction: rtl" href="{{ route('profile_form') }}" class="dropdown-item"><i class="typcn typcn-edit"></i>ویرایش پروفایل</a>

                        {{--todo just admin role can show this--}}
                        <a style="direction: rtl" href="{{ route('roles.index') }}" class="dropdown-item"><i class="typcn typcn-key"></i>نقش ها</a>
{{--                        <a style="direction: rtl" href="{{ route('permissions.index') }}" class="dropdown-item"><i class="typcn typcn-key-outline"></i>دسترسی ها</a>--}}

                        <a style="direction: rtl" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item"><i class="typcn typcn-power-outline"></i>خروج</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a style="direction: rtl" href="{{ route('user_visits') }}" class="dropdown-item"><i class="typcn typcn-book"></i>ویزیت ها</a>


                    </div><!-- dropdown-menu -->
                </div>
            @else
                <div>
                    <button onclick="window.location='{{ route('register') }}'" class="btn btn-outline-primary">ثبت نام</button>
                    <button onclick="window.location='{{ route('login') }}'" class="btn btn-outline-primary">ورود</button>
                </div>
            @endauth
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header -->



{{--navbar--}}
<div class="az-navbar">
    <div class="container">

        <div>
            <a href="{{ route('clinics.index') }}" style="font-family: iransansmedium" class="az-logo">@lang('auth.logo.name')</a>
        </div>
        <form method="post" action="{{ route('search') }}" class="az-navbar-search">
            @csrf
            <input name="word" type="search" class="form-control" placeholder="جستجو کنید ...">
            <button type="submit" class="btn"><i class="fas fa-search "></i></button>
        </form><!-- az-navbar-search -->

        <ul  class="nav">
            <li class="nav-label">منو اصلی</li>

            <li class="nav-item @if(isset($title)) @if($title == 'clinics') active @endif @endif">
                <a href="{{ route('clinics.index') }}" class="nav-link"><i class="typcn typcn-device-desktop"></i>بیمارستان ها</a>
            </li><!-- nav-item -->
            <li class="nav-item @if(isset($title)) @if($title == 'doctors') active @endif @endif">
                <a href="{{ route('doctors.index') }}" class="nav-link"><i class="typcn typcn-group"></i>پزشکان </a>
            </li>
            <li class="nav-item @if(isset($title)) @if($title == 'employees') active @endif @endif">
                <a href="{{ route('employees.index') }}" class="nav-link"><i class="typcn typcn-group-outline"></i>کادر درمانی</a>
            </li>
            <li class="nav-item @if(isset($title)) @if($title == 'patients') active @endif @endif">
                <a href="{{ route('patients.index') }}" class="nav-link"><i class="typcn typcn-device-phone"></i> مراجعین</a>
            </li>

            <li class="nav-item @if(isset($title)) @if($title == 'visits') active @endif @endif">
                <a href="{{ route('visits.index') }}" class="nav-link"><i class="typcn typcn-puzzle-outline"></i>نوبت ها</a>
            </li>
            <li class="nav-item @if(isset($title)) @if($title == 'users') active @endif @endif">
                <a href="{{ route('users.index') }}" class="nav-link"><i class="typcn typcn-business-card"></i>کاربران</a>
            </li>
            <li class="nav-item @if(isset($title)) @if($title == 'sections') active @endif @endif">
                <a href="{{ route('sections.index') }}" class="nav-link"><i class="typcn typcn-th-list"></i>بخش ها</a>
            </li>
            <li class="nav-item @if(isset($title)) @if($title == 'medicines') active @endif @endif">
                <a href="{{ route('medicines.index') }}" class="nav-link"><i class="typcn typcn-th-menu-outline"></i>دارو ها</a>
            </li>
            <li class="nav-item @if(isset($title)) @if($title == 'salaries') active @endif @endif">
                <a href="{{ route('salaries.index') }}" class="nav-link"><i class="typcn typcn-th-large"></i>حقوق ها</a>
            </li>


            <li class="nav-item">
                {{--todo change this route to index method--}}
                <button onclick="window.location='{{ route('site_index') }}'" class="btn btn-primary">خانه</button>
                {{--<button onclick="window.location='{{ route('site_index') }}'" class="btn btn-success">ویزیت ها</button>--}}
            </li>

        </ul><!-- nav -->
    </div><!-- container -->
</div><!-- az-navbar -->
