<section class="siteSec">
    <div class="container">
        <div class="row">
           <?php echo $__env->make('front.includes.only-forum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

           <?php echo $__env->make('front.includes.find-me-room', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</section>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/front/includes/forum-home.blade.php ENDPATH**/ ?>