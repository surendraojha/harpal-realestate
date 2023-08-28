<?php $__env->startSection('content'); ?>

<div class="about-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1><?php echo e($information->title); ?></h1>
          <p><?php echo $information->description; ?></p>
        </div>
      </div>
    </div>
  </div>

  <?php if($testimonials->isNotEmpty()): ?>
  <section class="testimonial-section2">
   <div class="row text-center">
         <div class="col-12">
            <div class="h2">Testimonial</div>
         </div>
      </div>
     <div id="testim" class="testim">

  <!--         <div class="testim-cover"> -->
          <div class="wrap">

              <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
              <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
              <ul id="testim-dots" class="dots">

                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <li class="dot <?php if($loop->last): ?> active <?php endif; ?>"></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  
              </ul>
              <div id="testim-content" class="cont">

                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div class="">
                      <div class="img"><img src="<?php echo e(asset('uploads/'.$value->photo)); ?>" alt=""></div>
                      <div class="h4"><?php echo e($value->name); ?></div>
                      <p><?php echo e($value->message); ?></p>
                  </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
               </div>
          </div>
  <!--         </div> -->
  </section>

  <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/about-us.blade.php ENDPATH**/ ?>