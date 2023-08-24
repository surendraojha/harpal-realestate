<?php $__env->startSection('content'); ?>


<div class="agent-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <h1><?php echo e($information->name); ?></h1>
          <p><strong><?php echo e($information->experience); ?> Years Experience</strong></p>
          <p><?php echo e($information->profile->about_me); ?></p>

          <p><i class="fa fa-phone"></i> <?php echo e($information->phone); ?></p>
          <p><i class="fa fa-envelope"></i> <?php echo e($information->email); ?></p>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <?php if($information->profile->photo): ?>
            <?php
                $photo_path = asset('uploads/' . $information->profile->photo);
            ?>
        <?php else: ?>
            <?php
                $photo_path = asset('front/assets/imgs/user.webp');
            ?>
        <?php endif; ?>
          <img src="<?php echo e($photo_path); ?>" alt="">
        </div>
      </div>
    </div>
  </div>

  <div class="propertylist-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h4>More Listings</h4>
        </div>

        <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">

        <?php if (isset($component)) { $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PropertyGrid::class, ['information' => $value]); ?>
<?php $component->withName('property-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12)): ?>
<?php $component = $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12; ?>
<?php unset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12); ?>
<?php endif; ?>
            </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if (isset($component)) { $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Pagination::class, ['informations' => $properties]); ?>
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

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/agent-detail.blade.php ENDPATH**/ ?>