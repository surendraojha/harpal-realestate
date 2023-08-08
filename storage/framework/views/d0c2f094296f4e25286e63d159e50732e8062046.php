<?php if($value->status !=0): ?>

<div class="<?php echo e($className); ?>" title="<?php echo e($value->title); ?>">
    <div class="recomedPro">
        <a href="<?php echo e(route('property.detail',$value->slug)); ?>"

        class="recLink">
            <img src="<?php echo e(asset('uploads/'.$value->featured_photo)); ?>" alt="<?php echo e($value->title); ?>" title="<?php echo e($value->title); ?>">
            <div class="recomContent">
                <p class="locationPin" data-bs-toggle="tooltip" data-bs-placement="right" title="Location: <?php echo e($value->location->location); ?>">
                    <span class="fas fa-map-pin"></span>
                    <?php echo e($value->location->location); ?>

                </p>
                <h5   data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $value->title; ?>">
                    <?php echo e($value->title); ?>    <?php if($value->status==2): ?>
                    (Sold Out)
                <?php else: ?>
                    <?php echo e($value->purpose->title); ?>

                <?php endif; ?>
                </h5>
            </div>
            <div class="priceTag">
                <?php
                $formatted_price = \App\Helpers\NumberHelper::formatnumber($value->price)
            ?>

                Rs. <?php echo e($formatted_price); ?>/-
            </div>
            
        </a>
    </div>
</div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/new-deal.blade.php ENDPATH**/ ?>