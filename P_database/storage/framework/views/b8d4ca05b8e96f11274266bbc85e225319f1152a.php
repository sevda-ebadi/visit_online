

<?php $__env->startSection('custom_style'); ?>
    <style>
        .select2-results__option {
            text-align: right;
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('baba_khani/persian-datepicker.css')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="az-content">
        <div class="container">
            <form method="post" action="<?php echo e(route('store_visit')); ?>" class="az-content-body">
                <?php echo csrf_field(); ?>
                <div style="text-align: right">

                    
                    <h2 class="az-content-title"> ثبت ویزیت جدید </h2>
                </div>


                <?php echo $__env->make('admin_admin.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام</p>
                        <input disabled value="<?php echo e(auth()->user()->name); ?>" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام خانوادگی</p>
                        <input disabled value="<?php echo e(auth()->user()->family); ?>" name="family" style="text-align: right" class="form-control" placeholder="نام خانوادگی" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">نام پزشک معالج</p>
                        <input disabled value="<?php echo e($doctor->user()->first()->name.' '.$doctor->user()->first()->family); ?>" name="name" style="text-align: right" class="form-control" placeholder="نام" type="text">
                    </div><!-- col -->
                </div><!-- row -->

                <input type="hidden" value="<?php echo e($doctor->id); ?>" name="doctor_id" />

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">تاریخ</p>
                        <input name="date" type="text" class="example1" />
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg">
                        <p style="text-align: right;">ساعت</p>
                        <input type="text" class="only-timepicker-example" name="time">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_script'); ?>
    <script src="<?php echo e(asset('baba_khani/persian-date.js')); ?>"></script>
    <script src="<?php echo e(asset('baba_khani/persian-datepicker.js')); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".example1").persianDatepicker({
                format: 'YYYY/MM/DD'
            });
        });

        $('.only-timepicker-example').persianDatepicker({
            onlyTimePicker: true,
            format: 'h-m'
        });
    </script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\hamidreza_ghanbari_956127026\P_database\resources\views/admin_admin/frontend/create_visit.blade.php ENDPATH**/ ?>