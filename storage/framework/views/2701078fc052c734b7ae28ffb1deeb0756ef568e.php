
<?php if($value->status !=0): ?>
<div class="<?php echo e($className); ?>">
    <div class="singleProductBox">
        <div class="singleProductImg"  >
            <img src="<?php echo e(asset('uploads/'.$value->featured_photo)); ?>" alt="<?php echo e($value->title); ?>" >
            <div class="boxTag">

                <?php if($value->status==2): ?>
                    Sold Out
                <?php else: ?>
                    <?php echo e($value->purpose->title); ?>

                <?php endif; ?>
            </div>

            <?php if(auth()->guard()->check()): ?>
            <?php if (isset($component)) { $__componentOriginal3b78b30f0710a0bb1a5a877dff0d3dcb10605b84 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AddWishList::class, ['value' => $value]); ?>
<?php $component->withName('add-wish-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b78b30f0710a0bb1a5a877dff0d3dcb10605b84)): ?>
<?php $component = $__componentOriginal3b78b30f0710a0bb1a5a877dff0d3dcb10605b84; ?>
<?php unset($__componentOriginal3b78b30f0710a0bb1a5a877dff0d3dcb10605b84); ?>
<?php endif; ?>

            <?php endif; ?>

            <div class="hoverBtn" title="<?php echo e($value->title); ?>">
                <a href="<?php echo e(route('property.detail',$value->slug)); ?>" title="<?php echo e($value->title); ?>">
                    View
                </a>
            </div>
        </div>
        <div class="singleBoxContent">
            <a href="<?php echo e(route('property.detail',$value->slug)); ?>"  data-bs-toggle="tooltip" data-bs-placement="top"
             title="<?php echo e($value->title); ?>">
                <h4>
                    <?php echo e($value->title); ?>

                </h4>
            </a>
            <div class="row">
                <div class="col-12">
                    <div class="priceRange">
                        <p class="locationPin" data-bs-toggle="tooltip" data-bs-placement="top" title="Location: <?php echo e($value->location->location); ?>">
                            <span class="fas fa-map-pin"></span>
                            <?php echo e($value->location->location); ?>

                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="amenities pe-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Category:<?php echo e(@$value->subcategory->title); ?>

                        ">
                        <img src="<?php echo e(asset('front/assets/imgs/apartment.svg')); ?>" alt="category" title="Category" height="13px" width="13px">


                      <?php echo e(@$value->subcategory->title); ?>

                    </div>
                </div>
                <div class="col">

                    <?php
                        $formatted_price = \App\Helpers\NumberHelper::formatnumber($value->price)
                    ?>
                    <div class="amenities"  data-bs-toggle="tooltip" data-bs-placement="top" title="Price: NPR. <?php echo e($formatted_price); ?> <?php if($value->price_negotiable): ?> Negotiable  <?php endif; ?>">
                        <img src="<?php echo e(asset('front/assets/imgs/money.svg')); ?>" alt="price" title="Price" height="13px" width="13px">
                        NPR. <?php echo e($formatted_price); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/components/featured-recommended.blade.php ENDPATH**/ ?>