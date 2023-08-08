



<?php if(@$meta): ?>
    <?php $__env->startSection('title', $meta->meta_title); ?>

    <?php $__env->startSection('meta'); ?>
        <?php if (isset($component)) { $__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MetaHead::class, ['meta' => $meta]); ?>
<?php $component->withName('meta-head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6)): ?>
<?php $component = $__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6; ?>
<?php unset($__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6); ?>
<?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php else: ?>

<?php $__env->startSection('title', $title); ?>

<?php endif; ?>



<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal21561dc8f66ede5123d30c72e10db4b487bd59f6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MainSearch::class, ['locations' => $locations,'categories' => $categories]); ?>
<?php $component->withName('main-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal21561dc8f66ede5123d30c72e10db4b487bd59f6)): ?>
<?php $component = $__componentOriginal21561dc8f66ede5123d30c72e10db4b487bd59f6; ?>
<?php unset($__componentOriginal21561dc8f66ede5123d30c72e10db4b487bd59f6); ?>
<?php endif; ?>


    <section class="siteSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="siteTitle">
                        <h3>
                            <?php echo e($title); ?>

                        </h3>
                    </div>
                </div>
            </div>

<?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $top_wide_advertisements]); ?>
<?php $component->withName('wide-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3)): ?>
<?php $component = $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3; ?>
<?php unset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3); ?>
<?php endif; ?>

                  <?php
                $route = route('front.newdeals');
            ?>

            <?php if (isset($component)) { $__componentOriginal28217279e6743e5cf8878699295a76d7d673d709 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WholeSort::class, ['route' => $route,'order' => $order]); ?>
<?php $component->withName('whole-sort'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal28217279e6743e5cf8878699295a76d7d673d709)): ?>
<?php $component = $__componentOriginal28217279e6743e5cf8878699295a76d7d673d709; ?>
<?php unset($__componentOriginal28217279e6743e5cf8878699295a76d7d673d709); ?>
<?php endif; ?>
            <div class="row-cols-5 row">

                <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $className = 'col-md-25';
                    ?>
                    <?php if (isset($component)) { $__componentOriginala3fc0a5786d46ba74473c15b8df3072d5cca4eb8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FeaturedRecommended::class, ['value' => $value,'className' => $className]); ?>
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

            <?php if (isset($component)) { $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Pagination::class, ['informations' => $informations]); ?>
<?php $component->withName('pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966)): ?>
<?php $component = $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966; ?>
<?php unset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966); ?>
<?php endif; ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/front/new-deals.blade.php ENDPATH**/ ?>