

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
            
            <h1 class="title">بخش ها</h1>
            <p class="title-text">به بخش های کلینیک خوش آمدید</p>

            <div class="row">

                <?php if(count($sections) > 0): ?>
                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="direction: rtl" class="col-sm-6 col-lg-4 mg-t-40 mg-b-40 mg-sm-t-0">
                            <div class="card">
                                <figure >
                                    <div><img src="<?php echo e(asset('frontend_images/section.png')); ?>" class="img-fluid" alt=""></div>
                                    <?php if(count($section->doctors()->get()) > 0): ?>
                                        <figcaption>
                                            <a href="<?php echo e(route('site_doctors', ['section_id'=>$section->id])); ?>" class="btn btn-primary">مشاهده پزشکان </a>
                                        </figcaption>
                                    <?php else: ?>
                                        <figcaption>
                                            <button disabled class="btn btn-danger" >فاقد پزشک</button>
                                        </figcaption>
                                    <?php endif; ?>
                                </figure>
                            </div>
                            <label class="az-content-label pt-3 pb-3"><?php echo e($section->name); ?></label>
                            <h6 class="az-content-title"> تخت <?php echo e($section->number_of_bed); ?></h6>
                        </div><!-- col -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div style="text-align: right;direction: rtl" class="alert alert-primary row container-fluid">
                        هیچ بخش ای ثبت نشده است
                    </div>
                <?php endif; ?>


                <?php echo $sections->render(); ?>






            </div><!-- row -->
        </div><!-- container-fluid -->
    </div><!-- az-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamid\Desktop\hamidreza_ghanbari_956127026\P_database\resources\views/admin_admin/frontend/site_sections.blade.php ENDPATH**/ ?>