<?php $__env->startSection('content'); ?>


<div class="propertylist-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 page-title">
          <h1><?php echo e($title); ?></h1>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">

            <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PropertyGrid::class, ['information' => $value->property]); ?>
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


        <div class="col-12 col-sm-12">
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
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/featured-listing.blade.php ENDPATH**/ ?>