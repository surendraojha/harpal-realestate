<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <div class="listingBoxes mt-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <h4 class="dashInfoTitle">
                        Hello ,<?php echo e($user->name); ?>

                    </h4>
                    <div class="dashInfoText">
                        <?php echo $setting->vendor_dashboard_content; ?>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="singleStatBox">
                    <h4>
                        Total Listed
                    </h4>
                    <div class="statNum">
                        <?php echo e($total_listed); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/dashboard.blade.php ENDPATH**/ ?>