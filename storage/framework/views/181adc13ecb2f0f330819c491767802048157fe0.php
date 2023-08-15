<?php if(@$photos->isEmpty() == false): ?>
    <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $div_id = 'photo-' . rand() . '-' . $value->id;
        ?>
        <div class='mb-3' id="<?php echo e($div_id); ?>">
            <img height="100px" src="<?php echo e(asset('uploads/' . $value->photo)); ?>" alt="<?php echo e($information->title); ?>">
            <button type="button" class="btn btn-danger"
                onclick="deletePhotoServer('<?php echo e($value->id); ?>','<?php echo e($div_id); ?>')"><i
                    class='fa fa-trash'></i></button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/property/edit-photos.blade.php ENDPATH**/ ?>