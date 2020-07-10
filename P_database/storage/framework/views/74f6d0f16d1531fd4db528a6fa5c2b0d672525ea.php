

<?php $__env->startSection('custom_style'); ?>
    <style>
        div.col-sm-6 > div > figure > div > img {
            width: 56%;
            height: 100%;
            object-fit: cover;
            text-align: center;
        }
        div.col-sm-6 > div > figure {
            height: 100%;
        }
        div.col-sm-6 > div > figure > div {
            height: 100%;
            display: flex;
            justify-content: center;
        }
        #azDemo > div:nth-child(1) {
            padding-top: 70px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div id="azDemo" class="az-content az-content-choose-demo">
        <div style="text-align: right;" class="container">
            
            <h1 class="title">پزشک ها</h1>
            <p class="title-text">به بخش پزشکان خوش آمدید</p>

            <div class="row">

                <?php if(count($doctors) > 0): ?>
                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="direction: rtl" class="col-sm-6 col-lg-4 mg-t-40 mg-b-40 mg-sm-t-0">
                            <div class="card">
                                <figure >
                                    <div><img src="<?php echo e(asset('frontend_images/doctor.png')); ?>" class="img-fluid" alt=""></div>
                                        <figcaption>
                                            <a href="<?php echo e(route('create_visit', ['doctor_id'=>$doctor->id])); ?>" class="btn btn-primary" >گرفتن ویزیت</a>
                                        </figcaption>
                                </figure>
                            </div>
                            <label class="az-content-label pt-3 pb-3"><?php echo e($doctor->user()->first()->name.' '.$doctor->user()->first()->family); ?></label>
                            
                        </div><!-- col -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div style="text-align: right;direction: rtl" class="alert alert-primary row container-fluid">
                        هیچ پزشک ای ثبت نشده است
                    </div>
                <?php endif; ?>


                <?php echo $doctors->render(); ?>



            </div><!-- row -->
        </div><!-- container-fluid -->
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\asp\P_database\resources\views/admin_admin/frontend/site_doctors.blade.php ENDPATH**/ ?>