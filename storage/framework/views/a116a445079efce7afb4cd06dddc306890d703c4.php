<div class="property-grid">
    <a href="<?php echo e(route('property.detail',$information->slug)); ?>">

        <?php if(isset($information->photo) && file_exists(public_path('uploads/' . $information->photo))): ?>
            <img src="<?php echo e(asset('uploads/' . $information->photo)); ?>" alt="<?php echo e($information->title); ?>">
        <?php else: ?>
            <img src="<?php echo e(asset('no-photo.jpg')); ?>" alt="Default Photo">
        <?php endif; ?>

    </a>
    <div class="pro-box">
        <p class="for-sale"><?php echo e($information->purpose->title); ?></p>
        <h5><a href="<?php echo e(route('property.detail',$information->slug)); ?>"><?php echo e(Str::substr($information->title, 0, 20)); ?></a></h5>
        <p><i class="fa fa-map-marker-alt"></i> <?php echo e($information->location->location); ?></p>
        <ul class="listing">
            <li>Listing Id: <?php echo e($information->ad_id); ?></li>
            <li>Area: <?php echo e($information->area); ?></li>
        </ul>
        <h6><?php echo e($information->price); ?>

            

        </h6>
        <ul class="comments">
            <li><a href="#"><?php echo e($information->wishlist->count()); ?> <i class="fa-solid fa-thumbs-up"></i></a></li>
            <li><a href="#">11 <i class="fa fa-comments"></i></a></li>
            <li><a href="#"><?php echo e($information->view); ?> <i class="fa fa-eye"></i></a></li>
            <li><a href="#">11 <i class="fa-sharp fa-solid fa-share-nodes"></i></a></li>
        </ul>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/components/property-grid.blade.php ENDPATH**/ ?>