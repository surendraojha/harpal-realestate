        <meta name="description" content="<?php echo e($meta->meta_description); ?>">
        <meta name="keywords" content="<?php echo e($meta->meta_keyword); ?>">

        <?php if(!$meta->photo): ?>
            <meta property="og:image" content="<?php echo e(asset('uploads/'.$setting->banner)); ?>" />
        <?php else: ?>
            <meta property="og:image" content="<?php echo e(asset('uploads/'.$meta->photo)); ?>" />
        <?php endif; ?>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/meta-head.blade.php ENDPATH**/ ?>