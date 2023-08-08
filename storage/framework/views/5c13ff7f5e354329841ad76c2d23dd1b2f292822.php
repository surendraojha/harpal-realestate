<div class="col-md-9">
    <div class="row mb-3">
        <div class="col-md-9">

            <?php if($count_property<$per_page): ?>
            <span>
                <?php echo e($count_property); ?> Showing of <?php echo e($count_property); ?> results
            </span>
        </div>
        <?php else: ?>
        <span>
            <?php echo e($per_page); ?> Showing of <?php echo e($count_property); ?> results
        </span>
    </div>
        <?php endif; ?>

        <div class="col-md-3">
            <div class="fieldBox d-flex align-items-center">
                <span for="" style="white-space: nowrap; font-size: 14px;">
                    Sort By
                </span>

                <?php if (isset($component)) { $__componentOriginal14b33519c358f200708ba16fb66bdcf23638ba93 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SortSearch::class, ['order' => $order]); ?>
<?php $component->withName('sort-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14b33519c358f200708ba16fb66bdcf23638ba93)): ?>
<?php $component = $__componentOriginal14b33519c358f200708ba16fb66bdcf23638ba93; ?>
<?php unset($__componentOriginal14b33519c358f200708ba16fb66bdcf23638ba93); ?>
<?php endif; ?>

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

    <div class="row">

        <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php
            $className = 'col-md-3';
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

    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="fieldBox d-flex align-items-center">
                <select name="per_page" id="per_page" class="formCustom" onchange="this.form.submit()">
                    <option value="12" <?php echo e(old('per_page',@$per_page)==12?'selected':''); ?> >12 per page</option>
                    <option value="20" <?php echo e(old('per_page',@$per_page)==20?'selected':''); ?>>20 per page</option>
                    <option value="32" <?php echo e(old('per_page',@$per_page)==32?'selected':''); ?>>32 per page</option>
                </select>
            </div>
        </div>
        <div class="col-md-9">
          <?php echo e($informations->render()); ?>

        </div>
    </div>

</form>
</div>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/front/filter-result.blade.php ENDPATH**/ ?>