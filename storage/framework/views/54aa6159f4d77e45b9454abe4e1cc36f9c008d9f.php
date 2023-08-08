<?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container text-center py-3">
        <div class="row">
            <div class="col-12">
                <div class="kotha-ad">
                    <a style="cursor: pointer" onclick="window.open('<?php echo e($value->advertisement->link); ?>');" >
                        <img src="<?php echo e(asset('uploads/' . $value->advertisement->photo)); ?>" alt="Advertisement">

                    </a>
                </div>
            </div>
        </div>

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/components/wide-ad.blade.php ENDPATH**/ ?>