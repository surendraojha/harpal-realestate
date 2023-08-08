<!DOCTYPE html>
<html lang="en">
<head>

    <?php echo $__env->make('front.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

    


    <style>

       .text-danger{
            color: #dc3545 !important;

        }
        .invalid-custom{
            width: 100%;
            margin-top: 0.25rem;
            font-size: 12px;
            color: #dc3545;
            font-weight: 500;
            text-transform: uppercase;
            margin-bottom: 20px;
            flex: 0 0 100%;
            max-width: 100%
        }
    </style>

    <style>
        @media(min-width:767.9px){
            .mobileNavi{
                display: none;
            }
            .desktop-visible{
                display: block;
            }
            .mobile-visible{
                display: none;
            }
        }
        @media(max-width:991.9px){
            .desktopNav,.bannerImg::after{
                display: none;
            }
            .mobileNavi{
                display: flex;
            }
            .desktop-visible{
                display: none;
            }
            .mobile-visible{
                display: block;
            }
        }
        .signupRight .select2-container{
                margin-bottom: 0 !important;
            }
    </style>
    <!-- Site Footer start -->
    <!-- Lopgin signup Box -->
    <section class="dashboardSec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-2">
                    <div class="offcanvas dashNav offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="dashMenu" aria-controls="offcanvasScrolling" style="position: relative;">
                        <nav class="siteNav">
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            <button class="closeBtnDash" type="button" data-bs-toggle="offcanvas" data-bs-target="#dashMenu" aria-controls="dashMenu">
                                <i class="fas fa-angle-right"></i>
                              </button>
                            <a href="<?php echo e(route('profile')); ?>" class="profileBox">
                                <div>
                                    <?php if(@$profile->photo): ?>
                                    <?php
                                        $path = asset('uploads/' . @$profile->photo);
                                    ?>
                                <?php else: ?>
                                    <?php
                                        $path = asset('front/assets/imgs/user.png');
                                    ?>
                                <?php endif; ?>
                                    <img src="<?php echo e($path); ?>" alt="<?php echo e(@$user->name); ?>" height="50px" width="50px">
                                    Hello  <?php echo e($user->name); ?>

                                </div>
                            </a>
                            <ul class="dashboardMenu">


                                <?php
                                    $current_route = \Request::route()->getName();

                                ?>
                                <li>
                                    <a href="<?php echo e(route('front.dashboard')); ?>" class="<?php if($current_route=='front.dashboard'): ?> active <?php endif; ?>">
                                        <i class="fas fa-cookie"></i>
                                        <span>
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('my-property.index')); ?>"
                                    class="<?php if($current_route=='my-property.index'  || $current_route=='my-property.create'): ?> active <?php endif; ?>"
                                    >
                                        <i class="fas fa-home"></i>
                                        <span>
                                            My Rental
                                        </span>
                                    </a>
                                </li>


                                <li>
                                    <a href="<?php echo e(route('my-wishlist.index')); ?>"
                                    class="<?php if($current_route=='my-wishlist.index'): ?> active <?php endif; ?>"

                                    >
                                        <i class="fas fa-heart"></i>
                                        <span>
                                            Wishlist
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('profile')); ?>"
                                    class="<?php if($current_route=='profile'): ?> active <?php endif; ?>"

                                    >
                                        <i class="fas fa-user"></i>
                                        <span>
                                            Profile
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('front-testimonial.index')); ?>"
                                    class="<?php if($current_route=='front-testimonial.index'): ?> active <?php endif; ?>"

                                    >
                                        <i class="fas fa-user"></i>
                                        <span>
                                            Write Review
                                        </span>
                                    </a>
                                </li>

                                
                                <li>
                                    <a href="<?php echo e(route('front.change')); ?>"
                                    class="<?php if($current_route=='front.change'): ?> active <?php endif; ?>"

                                    >
                                    <i class="fa-solid fa-key"></i>
                                        <span>
                                            Change Password
                                        </span>
                                    </a>
                                </li>


                                <li>
                                    <a href="<?php echo e(route('my.comments')); ?>"
                                    class="<?php if($current_route=='my.comments'): ?> active <?php endif; ?>">
                                        <i class="fa-solid fa-reply"></i>
                                        <span>
                                           Forum Replies
                                        </span>
                                    </a>
                                </li>
                                
                                



                                <li>

                                    <form id="frm-logout" action="<?php echo e(route('custom.logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>


                                    <a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>
                                            Logout
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-10 signupRight">
                    <div class="row py-2 align-items-center">
                        <div class="col-md-2 col-12 order-1 mb-2">
                            <a href="<?php echo e(route('front.home')); ?>">
                                <img src="<?php echo e(asset('uploads/'.$setting->company_logo)); ?>" alt="<?php echo e($setting->company_name); ?>">
                            </a>
                        </div>

                        <div class="col-md-10 col-12 order-3 order-md-2">
                            <?php
                            $search_locations = \App\Models\Location::where('status',1)->orderBy('order')->get();
                        ?>
                            <form action="<?php echo e(route('filter.property')); ?>">
                                <div class="customForm d-flex dashSearch ps-lg-5 ms-lg-5">
                                    <?php
                                        $search_locations = \App\Models\Location::where('status',1)->orderBy('order')->get();
                                    ?>
                                    <select name="location[]" class="select2 dashLocation" multiple id="">
                                        <option value="" disabled >Type Here To Search</option>
                                        <?php $__currentLoopData = $search_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->location); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <button type="submit" class="px-4 py-3 customBtn" style="padding: unset;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>


                        <?php
                        $current_route = \Request::route()->getName();
                    ?>
                    
                </div>

                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Portion of menu in footer -->
    
    <!-- Serch Modal -->
    
    <!-- Search Modal -->
    
     


  <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdroptitle">Scan QR Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="customForm">

                        <img height="300px" src="<?php echo e(asset('uploads/'.$setting->qr_code)); ?>" alt="">
                </div>

        </div>
      </div>
    </div>
  </div>
</body>

<?php echo $__env->make('front.layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/front/layouts/profile.blade.php ENDPATH**/ ?>