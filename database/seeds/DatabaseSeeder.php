<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         factory(\App\User::class, 50)->create();


         $this->call(ClinicSeeder::class);
         $this->call(SectionSeeder::class);

         $this->call(DoctorSeeder::class);
         $this->call(PatientSeeder::class);
         $this->call(EmployeeSeeder::class);
         $this->call(VisitSeeder::class);
         $this->call(MedicineSeeder::class);
         $this->call(SalarySeeder::class);

         // section and doctors
        for ($i = 0 ; $i < 20; $i++) {
            \Illuminate\Support\Facades\DB::table('doctor_section')->insert(
                [
                    'doctor_id'=>rand(1, 20),
                    'section_id'=>rand(1, 20)
                ]
            );
        }

        $this->createRolePermission();
    }


    protected function createRolePermission()
    {
        // create roles
        // admin
        $admin = \App\Role::create([
           'name'=>'admin',
           'persian_name'=>'ادمین سایت',
        ]);

        // patient
        $patient = \App\Role::create([
            'name'=>'patient',
            'persian_name'=>'بیمار',
        ]);

        // doctor(secretary)
        $secretary = \App\Role::create([
            'name'=>'secretary',
            'persian_name'=>'منشی پزشک',
        ]);
        // hospital admin
        $hospital = \App\Role::create([
            'name'=>'hospital_admin',
            'persian_name'=>'رییس بیمارستان',
        ]);


        // create permissions
        // create visit
        $create_visit = \App\Permission::create([
           'name'=>'create_visit',
           'persian_name'=>'درخواست ویزیت',
        ]);

        // crud doctors
        $crud_doctors = \App\Permission::create([
            'name'=>'crud_doctors',
            'persian_name'=>'مدیریت پزشکان',
        ]);

        // crud sections
        $crud_sections = \App\Permission::create([
            'name'=>'crud_sections',
            'persian_name'=>'مدیریت بخش ها',
        ]);

        // crud employees
        $crud_employees = \App\Permission::create([
            'name'=>'crud_employees',
            'persian_name'=>'مدیریت کارمندان',
        ]);

        // crud salaries
        $crud_salaries = \App\Permission::create([
            'name'=>'crud_salaries',
            'persian_name'=>'مدیریت حقوق ها',
        ]);

        // change visit and submit visit
        $manage_visit = \App\Permission::create([
            'name'=>'manage_visit',
            'persian_name'=>'مدیریت ویزیت ها',
        ]);


        // add relation to above code
        $admin->permissions()->sync(
            $create_visit,$crud_doctors,$crud_salaries,$crud_employees,$crud_sections,
        $manage_visit);

        $patient->permissions()->sync(
            $create_visit);

        $secretary->permissions()->sync(
            $manage_visit);

        $hospital->permissions()->sync(
            $crud_doctors,$crud_salaries,$crud_employees,$crud_sections);


        // create 4 user
        $user_admin = \App\User::create([
            'name'=>'admin',
            'family'=>'',
            'email'=>'admin@demo.com',
            'password'=>bcrypt(123456789),
        ]);
        $user_admin->roles()->sync($admin);

        $user_patient = \App\User::create([
            'name'=>'patient',
            'family'=>'',
            'email'=>'patient@demo.com',
            'password'=>bcrypt(123456789),
        ]);
        $user_patient->roles()->sync($patient);

        $user_secretary = \App\User::create([
            'name'=>'secretary',
            'family'=>'',
            'email'=>'secretary@demo.com',
            'password'=>bcrypt(123456789),
        ]);
        $user_secretary->roles()->sync($secretary);

        $user_hospital_admin = \App\User::create([
            'name'=>'hospital admin',
            'family'=>'',
            'email'=>'hospital_admin@demo.com',
            'password'=>bcrypt(123456789),
        ]);
        $user_hospital_admin->roles()->sync($hospital);
    }
 }
