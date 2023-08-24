<?php $__env->startSection('content'); ?>
<div class="agency-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>Agencies</h1>
        </div>
        <div class="col-12 col-sm-12 agency-search">
          <form action="<?php echo e(Request::url()); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="md-form">
                  <label>Agency</label>
                  <input type="text" name="keyword" value="<?php echo e(request()->keyword); ?>" class="form-control" placeholder="Enter Agency Name">
                </div>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
              </div>
            </div>
          </form>
        </div>

        <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
          <a href="<?php echo e(route('front.agency-detail',$value->email)); ?>">
            <?php if($value->profile->photo): ?>
                            <?php
                                $photo_path = asset('uploads/' . $value->profile->photo);
                            ?>
                        <?php else: ?>
                            <?php
                                $photo_path = asset('front/assets/imgs/user.webp');
                            ?>
                        <?php endif; ?>
            <img class="agency-img" src="<?php echo e($photo_path); ?>" alt="">
          </a>
          <div class="agency-box">
            
            <h2><a href="<?php echo e(route('front.agency-detail',$value->email)); ?>"><?php echo e($value->name); ?></a></h2>
            <h6>Kathmandu, Nepal</h6>
            <hr>
            <p><a href="#"><i class="fa fa-phone-volume"></i> <?php echo e($value->phone); ?></a></p>
            <p><a href="#"><i class="fa fa-envelope"></i> <?php echo e($value->email); ?></a></p>
          </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <?php if (isset($component)) { $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Pagination::class, ['informations' => $informations]); ?>
<?php $component->withName('pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966)): ?>
<?php $component = $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966; ?>
<?php unset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966); ?>
<?php endif; ?>

      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/agency-list.blade.php ENDPATH**/ ?>