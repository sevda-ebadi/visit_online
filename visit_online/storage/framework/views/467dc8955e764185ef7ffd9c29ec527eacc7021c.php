

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
            
            <h1 class="title">بیمارستان ها</h1>
            <p class="title-text">به بخش بیمارستان ها و کلینک ها خوش آمدید</p>

            <div class="row">

                <?php if(count($clinics) > 0): ?>
                    <?php $__currentLoopData = $clinics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="direction: rtl" class="col-sm-6 col-lg-4 mg-t-40 mg-b-40 mg-sm-t-0">
                            <div class="card">
                                <figure >
                                    <div><img src="<?php echo e(asset('frontend_images/hospital_image.png')); ?>" class="img-fluid" alt=""></div>

                                    <?php if(count($clinic->sections()->get()) > 0): ?>

                                    <figcaption>
                                        <a href="<?php echo e(route('site_sections', ['clinic_id'=>$clinic->id])); ?>" class="btn btn-primary">مشاهده بخش ها</a>
                                    </figcaption>

                                    <?php else: ?>
                                        <figcaption>
                                            <button disabled class="btn btn-danger" >فاقد بخش</button>
                                        </figcaption>

                                    <?php endif; ?>
                                </figure>
                            </div>
                            <label class="az-content-label pt-3 pb-3"><?php echo e($clinic->name); ?></label>
                            <h6 class="az-content-title"><?php echo e(\Illuminate\Support\Str::limit($clinic->address, 25)); ?></h6>
                        </div><!-- col -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div style="text-align: right;direction: rtl" class="alert alert-primary row container-fluid">
                        هیچ بیمارستانی ثبت نشده است
                    </div>
                <?php endif; ?>


                <?php echo $clinics->render(); ?>






            </div><!-- row -->
        </div><!-- container-fluid -->
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/amirjani/Desktop/SevdaEbadi946127039/visit_online/resources/views/admin_admin/frontend/site_index.blade.php ENDPATH**/ ?>