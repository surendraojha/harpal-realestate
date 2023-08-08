     <div class="position-relative mt-4">
         <div class="row">

             <?php $__currentLoopData = $advertisement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="col-12">
                     <a style="cursor: pointer" onclick="window.open('<?php echo e($value->advertisement->link); ?>');
">
                         <img src="<?php echo e(asset('uploads/' . @$value->advertisement->photo)); ?>" alt="Advertisement">

                     </a>
                 </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         </div>
     </div>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/sidebar-ad.blade.php ENDPATH**/ ?>