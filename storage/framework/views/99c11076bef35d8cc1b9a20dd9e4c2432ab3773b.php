<div class="col-md-12 mb-3">

    <div class="customForm custom-checkbox">
        <span class="radioTitle">
            Local Area Facilities
        </span>


        <div class="d-flex label-checkbox">
            <?php $__currentLoopData = $additional_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check">
                    <input class="form-check-input" name="feature_id[]"
                        <?php if(@$checked_features): ?> <?php if(in_array($value->id, $checked_features)): ?>
                            checked <?php endif; ?>
                        <?php endif; ?>

                    type="checkbox"
                    value="<?php echo e($value->id); ?>" id="feature<?php echo e($value->id); ?>">
                    <label class="form-check-label" for="feature<?php echo e($value->id); ?>">
                        <?php echo e($value->title); ?>

                    </label>
                </div>
              
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\kotha-bhada\resources\views/components/local-area-facility.blade.php ENDPATH**/ ?>