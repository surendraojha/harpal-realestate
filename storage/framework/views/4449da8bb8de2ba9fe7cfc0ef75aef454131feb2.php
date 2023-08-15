<?php $__env->startSection('content'); ?>

<div class="financial-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>Financial Supports</h1>
          <h2>Contact Nearest Bank</h2>
        </div>

        <?php $__currentLoopData = $financial_support; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-12 col-sm-12">
          <div class="nearest-box">
            <img src="<?php echo e(asset('financial-support/'.$value->photo)); ?>" alt="">
            <h3><?php echo e($value->title); ?></h3>
            <hr>
            <h5><?php echo e($value->subtitle); ?></span></h5>
            <ul>
              
              <li>Interest Rate: <span><?php echo e($value->interest_rate); ?>%</span></li>
              <li>Loan Year: <span><?php echo e($value->loan_year); ?> Years</span></li>
              <li>Insurance: <span><?php echo e($value->insurance?'Yes':'No'); ?></span></li>
            </ul>
            <a href="#" class="btn btn-contact">Contact Us</a>
            <a href="#" class="btn btn-apply">Apply Now</a>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/financial-support.blade.php ENDPATH**/ ?>