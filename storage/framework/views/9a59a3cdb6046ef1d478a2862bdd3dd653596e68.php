<div class="col-md-12">
    <div class="md-form">
        <?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="custom_field_identifier[]"
            value="<?php echo e($value->identifier); ?>">

            <input type="hidden" name="custom_field_label[]"
            value="<?php echo e($value->label); ?>">

            <label for="<?php echo e($value->identifier); ?>"><?php echo e($value->label); ?></label>
            <input type="text" name="custom_field_value[]" <?php if($value->required): ?> required <?php endif; ?>>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/property/custom-fields.blade.php ENDPATH**/ ?>