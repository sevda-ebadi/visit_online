<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="<?php echo e(route('clinics.index')); ?>" style="font-family: iransansmedium" class="az-logo"><?php echo app('translator')->get('auth.logo.name'); ?></a>
            <a href="" id="azNavShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <form method="post" action="<?php echo e(route('search')); ?>" class="az-header-center">
            <?php echo csrf_field(); ?>
            <input name="word" type="search" class="form-control" placeholder=" ...جستجو کنید">
            <button type="submit" class="btn"><i class="fas fa-search"></i></button>
        </form><!-- az-header-center -->
        <div class="az-header-right">



            
            <?php if(auth()->guard()->check()): ?>
                <div class="dropdown az-profile-menu">
                        <a href="" class="az-img-user"><img src="<?php if(auth()->user()->avatar == null): ?> <?php echo e(asset('frontend_images/user.png')); ?> <?php else: ?> <?php echo e(auth()->user()->avatar); ?> <?php endif; ?>" alt=""></a>

                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>



                            <div class="az-header-profile">
                                <div class="az-img-user">
                                    <img src="<?php if(auth()->user()->avatar == null): ?> <?php echo e(asset('frontend_images/user.png')); ?> <?php else: ?> <?php echo e(auth()->user()->avatar); ?> <?php endif; ?>" alt="">
                                </div><!-- az-img-user -->
                                <h6><?php echo e(auth()->user()->name.' '.auth()->user()->family); ?></h6>

                                
                                <?php if(auth()->guard()->check()): ?>
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <span class="badge badge-primary"><?php echo e($role->persian_name); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <span class="badge badge-warning">بیمار</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div><!-- az-header-profile -->

                        <!-- <?php if(session()->has('mustVerifyEmail')): ?>
                            <h5>!ایمیل شما تایید نشده است</h5>
                            <a style="direction: rtl"  href="<?php echo e(route('test')); ?>" class="dropdown-item badge badge-warning">
                                
                                <h6 style="text-align:center"><b>برای تایید کلیک کنید.</b></h6>

                            </a>
                            
                        <?php endif; ?> -->

                        <?php if(!auth()->user()->has_two_factor): ?>
                            <a style="direction: rtl" href="<?php echo e(route('auth.two.factor.toggle')); ?>" class="dropdown-item"><i class="typcn typcn-user-outline"></i>اهراز هویت دو مرحله ای</a>
                        <?php endif; ?>
                        <a style="direction: rtl" href="<?php echo e(route('profile_form')); ?>" class="dropdown-item"><i class="typcn typcn-edit"></i>ویرایش پروفایل</a>

                        
                        <?php if(auth()->user()->hasRole('admin') ||auth()->user()->hasRole('hospital_admin')): ?>
                        <a style="direction: rtl" href="<?php echo e(route('roles.index')); ?>" class="dropdown-item"><i class="typcn typcn-key"></i>نقش ها</a>
                        <?php endif; ?>



                        <a style="direction: rtl" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item"><i class="typcn typcn-power-outline"></i>خروج</a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>

                        <a style="direction: rtl" href="<?php echo e(route('user_visits')); ?>" class="dropdown-item"><i class="typcn typcn-book"></i>ویزیت ها</a>


                    </div><!-- dropdown-menu -->
                </div>
            <?php else: ?>
                <div>
                    <button onclick="window.location='<?php echo e(route('register')); ?>'" class="btn btn-outline-primary">ثبت نام</button>
                    <button onclick="window.location='<?php echo e(route('login')); ?>'" class="btn btn-outline-primary">ورود</button>
                </div>
            <?php endif; ?>
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header -->




<div class="az-navbar" style="text-align: right">
    <div class="container">

        <div>
            <a href="<?php echo e(route('clinics.index')); ?>" style="font-family: iransansmedium" class="az-logo"><?php echo app('translator')->get('auth.logo.name'); ?></a>
        </div>
        <form method="post" action="<?php echo e(route('search')); ?>" class="az-navbar-search">
            <?php echo csrf_field(); ?>
            <input name="word" type="search" class="form-control" placeholder="...جستجو کنید">
            <button type="submit" class="btn"><i class="fas fa-search "></i></button>
        </form><!-- az-navbar-search -->

        <ul class="nav" style="width: 100%" dir="rtl">
            <li class="nav-label">منو اصلی</li>

            <?php if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hospital_admin') || auth()->user()->hasRole('secretary')): ?>
                <li class="nav-item <?php if(isset($title)): ?> <?php if($title == 'clinics'): ?> active <?php endif; ?> <?php endif; ?>">
                    <a href="<?php echo e(route('clinics.index')); ?>" class="nav-link"> بیمارستان ها <i class="typcn typcn-device-desktop"></i></a>
                </li><!-- nav-item -->
            <?php endif; ?>
            <li class="nav-item <?php if(isset($title)): ?> <?php if($title == 'doctors'): ?> active <?php endif; ?> <?php endif; ?>">
                <a href="<?php echo e(route('doctors.index')); ?>" class="nav-link"> پزشکان <i class="typcn typcn-group"></i></a>
            </li>
            <?php if(auth()->user()->hasRole('admin') ||auth()->user()->hasRole('hospital_admin') || auth()->user()->hasRole('secretary')): ?>
                <li class="nav-item <?php if(isset($title)): ?> <?php if($title == 'employees'): ?> active <?php endif; ?> <?php endif; ?>">
                    <a href="<?php echo e(route('employees.index')); ?>" class="nav-link"> کادر درمانی <i class="typcn typcn-group-outline"></i></a>
                </li>
            <?php endif; ?>
            <?php if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hospital_admin')): ?>
                <li class="nav-item <?php if(isset($title)): ?> <?php if($title == 'patients'): ?> active <?php endif; ?> <?php endif; ?>">
                    <a href="<?php echo e(route('patients.index')); ?>" class="nav-link"> مراجعین <i class="typcn typcn-device-phone"></i></a>
                </li>
            <?php endif; ?>

            <li class="nav-item <?php if(isset($title)): ?> <?php if($title == 'visits'): ?> active <?php endif; ?> <?php endif; ?>">
                <a href="<?php echo e(route('visits.index')); ?>" class="nav-link"> نوبت ها <i class="typcn typcn-puzzle-outline"></i></a>
            </li>
            <?php if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hospital_admin')): ?>
                <li class="nav-item <?php if(isset($title)): ?> <?php if($title == 'users'): ?> active <?php endif; ?> <?php endif; ?>">
                    <a href="<?php echo e(route('users.index')); ?>" class="nav-link"> کاربران <i class="typcn typcn-business-card"></i></a>
                </li>
            <?php endif; ?>
            <li class="nav-item <?php if(isset($title)): ?> <?php if($title == 'sections'): ?> active <?php endif; ?> <?php endif; ?>">
                <a href="<?php echo e(route('sections.index')); ?>" class="nav-link"> بخش ها <i class="typcn typcn-th-list"></i></a>
            </li>
            <li class="nav-item <?php if(isset($title)): ?> <?php if($title == 'medicines'): ?> active <?php endif; ?> <?php endif; ?>">
                <a href="<?php echo e(route('medicines.index')); ?>" class="nav-link"> دارو ها <i class="typcn typcn-th-menu-outline"></i></a>
            </li>
            <?php if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('hospital_admin')): ?>
                <li class="nav-item <?php if(isset($title)): ?> <?php if($title == 'salaries'): ?> active <?php endif; ?> <?php endif; ?>">
                    <a href="<?php echo e(route('salaries.index')); ?>" class="nav-link"> حقوق ها <i class="typcn typcn-th-large"></i></a>
                </li>
            <?php endif; ?>



            <li class="nav-item">
                
                <button onclick="window.location='<?php echo e(route('site_index')); ?>'" class="btn btn-primary">خانه</button>
                
            </li>

        </ul><!-- nav -->
    </div><!-- container -->
</div><!-- az-navbar -->
<?php /**PATH C:\Users\sevda\Desktop\visit_online\resources\views/admin_admin/layout/header.blade.php ENDPATH**/ ?>