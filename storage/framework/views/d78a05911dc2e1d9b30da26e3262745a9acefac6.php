

<section class="siteSec recommendedSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="siteTitle">
                    <h3>
                        
                        <?php echo e($setting->new_deals_term); ?>


                    </h3>
                </div>
            </div>

            <?php $__currentLoopData = $new_deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $className = 'col-md-4 col-lg-2 col-6 mb-4 recSin';
                ?>

                <?php if (isset($component)) { $__componentOriginalbca45c181e881cb54b47417d5bf3e2890178da9e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\NewDeal::class, ['value' => $value,'className' => $className]); ?>
<?php $component->withName('new-deal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbca45c181e881cb54b47417d5bf3e2890178da9e)): ?>
<?php $component = $__componentOriginalbca45c181e881cb54b47417d5bf3e2890178da9e; ?>
<?php unset($__componentOriginalbca45c181e881cb54b47417d5bf3e2890178da9e); ?>
<?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 text-end">
                <a href="<?php echo e(route('front.newdeals')); ?>" class="siteBtn d-inline-block mt-3 text-end py-2">
                    Show All <i class="flaticon-right-arrow ps-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\kotha-bhada\resources\views/front/includes/new-deals.blade.php ENDPATH**/ ?>