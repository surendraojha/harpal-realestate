<?php $__env->startSection('title','Create Review'); ?>




<?php $__env->startSection('content'); ?>


    
    <div class="ContactForm moreDetailSignup">
        <form action="<?php echo e(route('front-testimonial.store')); ?>" id="property-form" method="post"
        enctype="multipart/form-data" >
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                        Add New Review
                    </h6>
                </div>
                <?php echo $__env->make('front.testimonials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                

                <div class="customForm">
                    <button class="colorBtn ms-0" type="submit">
                        SUBMIT FOR APPROVAL <i class="fas fa-arrow-right ps-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <?php
        $id = 'message';
        $outputId='output';
    ?>

<?php if (isset($component)) { $__componentOriginal8ed82213c590c2f69066540b06a9a20644760d28 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CharacterCount::class, ['id' => $id,'outputId' => $outputId]); ?>
<?php $component->withName('character-count'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8ed82213c590c2f69066540b06a9a20644760d28)): ?>
<?php $component = $__componentOriginal8ed82213c590c2f69066540b06a9a20644760d28; ?>
<?php unset($__componentOriginal8ed82213c590c2f69066540b06a9a20644760d28); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/testimonials/create.blade.php ENDPATH**/ ?>