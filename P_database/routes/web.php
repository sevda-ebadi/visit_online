<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'admin_admin.index')->name('index');

//Route::get('/', function() {
////   auth()->user()->hasPermission('create user');
////   dd(auth()->user()->can('create user'));
////    auth()->user()->withdrawRoles('admin');
////    \App\Role::find(1)->givePermissionsTo('create user');
////    auth()->user()->giveRolesTo('admin');
////    dd(auth()->user()->can('create user'));
//    dd(\App\User::with('roles')->get());
//});



// todo for middleware
//->middleware('role:admin')
//    ->middleware('can:crud_employees')




Route::get('user-visits', 'VisitController@user_visits')->name('user_visits');
Route::get('chagne-visist-status/{visit}', 'VisitController@changeStatus')->name('change_visit_status');




Route::get('edit-role-permission/{user}', 'UserController@editRolePermissionView')->name('edit_role_permission_view');
Route::post('edit-role-permission/{user}', 'UserController@editRolePermission')->name('edit_role_permission');

Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');



























Route::get('/site-index', 'FrontController@site_index')->name('site_index');
Route::get('/site-sections/${clinic_id}', 'FrontController@site_sections')->name('site_sections');
Route::get('/site-doctors/${section_id}', 'FrontController@site_doctors')->name('site_doctors');

Route::get('create-visit/${doctor_id}', 'VisitController@create_visit')->name('create_visit');
Route::post('create-visit', 'VisitController@store_visit')->name('store_visit');



Route::get('url', function() {
   \Illuminate\Support\Facades\URL::temporarySignedRoute('test');
});

Route::get('test', 'Auth\VerificationController@send')->name('test');



Route::get('send_test', 'Auth\VerificationController@verify')->name('send_test');





// forget password
Route::get('password/forget', 'Auth\ForgotPasswordController@showForgetForm')->name('forget_form');
Route::post('password/forget', 'Auth\ForgotPasswordController@sendResetLink')->name('send_reset_link');
Route::get('auth/password/reset', 'Auth\ResetPasswordController@showResetForm')->name('reset_form');
Route::post('auth/password/reset', 'Auth\ResetPasswordController@reset')->name('send_reset_password');
Route::get('redirect/{provider}', 'SocialController@redirectToProvider')->name('social_login');
Route::get('auth/{provider}/callback', 'SocialController@callbackProvider')->name('callback');
// for magic link
Route::get('magic/login', 'MagicController@showMagicForm')->name('magic_form');
Route::post('magic/login', 'MagicController@sendToken')->name('magic.send.token');
Route::get('magic/login/{token}', 'MagicController@login')->name('magic.login');
// two factor routes
Route::get('two-factor/toggle', 'TwoFactorController@toggle')->name('auth.two.factor.toggle');
Route::post('two-factor/activate', 'TwoFactorController@activate')->name('auth.two.factor.activate');

Route::get('two-factor/enter-code', 'TwoFactorController@enterCodeForm')->name('auth.two.enter.code.form');
Route::post('two-factor/enter-code', 'TwoFactorController@confirmCode')->name('auth.two.confirm.code');

// profile routes
Route::get('/profile', 'ProfileController@showForm')->name('profile_form');
Route::post('/profile', 'ProfileController@submitProfile')->name('submitProfile');



Route::get('/home', function() {
    return redirect()->route('clinics.index');
})->name('home')->middleware('checkEmailVerify');

Route::resource('clinics', 'ClinicController');
Route::resource('sections', 'SectionController');
Route::resource('doctors', 'doctorController');

Route::resource('salaries', 'SalaryController');
Route::resource('medicines', 'MedicineController');
Route::resource('users', 'UserController');
Route::resource('visits', 'VisitController');
Route::resource('patients', 'PatientController');
Route::resource('employees', 'EmployeeController');
Route::get('clinic-sections/${clinic_id}', 'ClinicController@clinic_sections')->name('clinic_sections');

Route::get('section-doctors/${section_id}', 'SectionController@section_doctors')->name('section_doctors');
Route::get('section-employees/${section_id}', 'SectionController@section_employees')->name('section_employees');

Route::get('employee-salary/${employee_id}', 'EmployeeController@employee_salary')->name('employee_salary');

Route::get('doctor-salary/${doctor_id}', 'DoctorController@doctor_salary')->name('doctor_salary');

Route::get('patient-visits/${patient_id}', 'PatientController@patient_visits')->name('patient_visits');

Route::get('visit-medicines/${visit_id}', 'VisitController@visit_medicines')->name('visit_medicines');

Route::post('search', 'SiteController@search')->name('search');


Auth::routes();

