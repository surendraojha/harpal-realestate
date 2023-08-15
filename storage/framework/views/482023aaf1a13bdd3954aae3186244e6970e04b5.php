<?php $__env->startSection('title','My Replies'); ?>


<?php $__env->startSection('content'); ?>


<div class="commentsListing">

    <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="commentNoti">
        <div class="d-flex align-items-center">
             <h6>
                <a href="<?php echo e(route('single.forum',$value->parent)); ?>">
                     Reply From  <strong> <?php echo e($value->user->name); ?></strong> in <b>
                        <?php echo e($value->comment); ?>

                    </b>
                </a>
            </h6>
            <span>

                <?php echo e($value->created_at->diffForHumans()); ?>

            </span>
        </div>
        <div>
            
            <a class="" href="<?php echo e(route('single.forum',$value->parent)); ?>">
                Reply
            </a>

        </div>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/my-replies.blade.php ENDPATH**/ ?>