<section class="siteSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="siteTitle">
                    <h3>
                       
                        <?php echo e($setting->featured_term); ?>




    	            
                    </h3>
                </div>
            </div>
        </div>
        <div class="row-cols-5 row">

            <?php $__currentLoopData = $featured_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php
            $className = 'col-md-25';
        ?>
                <?php if (isset($component)) { $__componentOriginala3fc0a5786d46ba74473c15b8df3072d5cca4eb8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FeaturedRecommended::class, ['value' => $value->property,'className' => $className]); ?>
<?php $component->withName('featured-recommended'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3fc0a5786d46ba74473c15b8df3072d5cca4eb8)): ?>
<?php $component = $__componentOriginala3fc0a5786d46ba74473c15b8df3072d5cca4eb8; ?>
<?php unset($__componentOriginala3fc0a5786d46ba74473c15b8df3072d5cca4eb8); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <div class="col-12 text-end">
                        <a href="<?php echo e(route('front.featured')); ?>" class="siteBtn d-inline-block mt-3 text-end py-2">
                            Show All <i class="flaticon-right-arrow ps-2"></i>
                        </a>
                    </div>



        </div>
    </div>


</section>
<?php /**PATH C:\xampp\htdocs\kotha-bhada\resources\views/front/includes/featured.blade.php ENDPATH**/ ?>