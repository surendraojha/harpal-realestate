<?php $__env->startSection('title','Gallery Page'); ?>

<?php $__env->startSection('content'); ?>


<div class="gallery-section">
    <div class="container">
     <div class="row">
       <div class="col-12 col-sm-12 page-title">
         <h1>Gallery Page</h1>
       </div>
     </div>
     <div class="portfolio-item row">

        <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

       <div class="item selfie col-12 col-sm-12 col-md-4 col-lg-3">
          <a href="<?php echo e(asset('uploads/'.$value->photo)); ?>" class="fancylight popup-btn"
            data-fancybox-group="light">
           <figure>
             <img class="img-fluid" src="<?php echo e(asset('uploads/'.$value->photo)); ?>" alt="">
           </figure>
          </a>
       </div>

       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




     </div>

     <div class="row">
        <div class="col-12 text-center">
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

<?php $__env->startPush('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>

<script>
    new WOW().init();
  </script>
  <script>
    $('.portfolio-item').isotope({
      itemSelector: '.item',
      layoutMode: 'fitRows'
     });
     $('.portfolio-menu ul li').click(function(){
      $('.portfolio-menu ul li').removeClass('active');
      $(this).addClass('active');

      var selector = $(this).attr('data-filter');
      $('.portfolio-item').isotope({
        filter:selector
      });
      return  false;
     });
     $(document).ready(function() {
     var popup_btn = $('.popup-btn');
     popup_btn.magnificPopup({
     type : 'image',
     gallery : {
      enabled : true
     }
   });
  });
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/gallery.blade.php ENDPATH**/ ?>