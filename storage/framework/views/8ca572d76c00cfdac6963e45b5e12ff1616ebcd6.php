

<?php $__env->startSection('title','My Properties'); ?>

<?php $__env->startSection('css'); ?>
    <style>
        @media(min-width:767.9px) {
            .mobileNavi {
                display: none;
            }

            .desktop-visible {
                display: block;
            }

            .mobile-visible {
                display: none;
            }
        }

        @media(max-width:991.9px) {

            .desktopNav,
            .bannerImg::after {
                display: none;
            }

            .mobileNavi {
                display: flex;
            }

            .desktop-visible {
                display: none;
            }

            .mobile-visible {
                display: block;
            }
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="listingBoxes mt-2 mt-md-5">
        <div class="d-flex justify-content-between flex-wrap midtop">
            <div>
                <ul class="nav nav-tabs justify-content-between" id="myTab" role="tablist">
                    <li class="nav-item" >

                        <form action="<?php echo e(route('my-property.index')); ?>">
                            <input type="hidden" name="page_type" value="1">
                            <button class="<?php if($page_type==1): ?> colorBtn py-2 px-4 <?php else: ?> nav-link <?php endif; ?>"
                            type="submit" aria-selected="true">Pending Ads
                            <?php echo e($pending_properties_count); ?></button>

                        </form>

                    </li>
                    <li class="nav-item" >

                            <form action="<?php echo e(route('my-property.index')); ?>">
                                <input type="hidden" name="page_type" value="2">
                                <button class="<?php if($page_type==2): ?> colorBtn py-2 px-4 <?php else: ?> nav-link <?php endif; ?>"
                                type="submit" aria-selected="true">Listed Ads
                                <?php echo e($active_propertycount); ?></button>

                            </form>
                    </li>
                    <li class="nav-item" >

                        <form action="<?php echo e(route('my-property.index')); ?>">
                            <input type="hidden" name="page_type" value="3">
                            <button class="<?php if($page_type==3): ?> colorBtn py-2 px-4 <?php else: ?> nav-link <?php endif; ?>"
                            type="submit" aria-selected="true">Expired Ads
                            <?php echo e($fulfilled_properties_count); ?></button>

                        </form>

                    </li>
                </ul>
            </div>
            <div>
                <?php
                    $current_route = \Request::route()->getName();
                ?>
                <div class="text-end order-2 order-md-3">
                    <a href="<?php echo e(route('my-property.create')); ?>" class="colorBtn py-2 px-4">
                        <i class="fas fa-plus"></i> Add Listing
                    </a>
                </div>


            </div>
        </div>

            <?php if($page_type==1): ?>

            <?php echo $__env->make('front.property.pending', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php elseif($page_type==2): ?>
                <?php echo $__env->make('front.property.active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>

                <?php echo $__env->make('front.property.fullfilled', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>


  <!-- qrcode popup -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-transparent" style="border:0 !important;">
        <div class="modal-header" style="border-bottom:0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          object-fit:contain; margin:0 auto;">
        </div>
        <div class="modal-footer" style="border-top:0" >
          <button type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Done</button>
        </div>
      </div>
    </div>
  </div>
    <?php $__env->stopSection(); ?>



<?php echo $__env->make('front.layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kotha-bhada\resources\views/front/property/index.blade.php ENDPATH**/ ?>