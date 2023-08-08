<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('front.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<body  onload="loadExtJS();">



<style>
    .siteHeader {
    padding: 5px 0;
    position: sticky;
    top: 0;
    z-index: 99;
    background-color: #fff;
}
@media (max-width: 991.9px){
    .searchForm {
        left:unset;
        margin-top:0;
    }
}
@media (min-width: 991.9px){
    .optionalPages{
    position:sticky;
    top:6rem;
    z-index:11;
}

}
</style>
    <header class="siteHeader" id="myHeader">
        <div class="menuHeader">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-4 col-xs-2">
                        <a href="<?php echo e(route('front.home')); ?>" class="logo">
                            <div>
                                <img src="<?php echo e(asset('uploads/'.@$setting->company_logo)); ?>" alt="<?php echo e($setting->company_name); ?>" width="130" height="80" style="object-fit: contain;">
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-lg-6 col-md-6  col-5 d-md-block">
                        <div class="iconsMenu">
                            <ul>

                                <li>
                                    <a href="<?php echo e(route('my-wishlist.index')); ?>" class="d-none d-md-block">
                                        <div class="listNum" id="wish-list">
                                        <?php if(auth()->guard()->check()): ?>
                                            <?php
                                                $wish_list_count = \App\Models\WishList::where('user_id',auth()->user()->id)->count();
                                            ?>
                                            <?php echo e($wish_list_count); ?>

                                            <?php else: ?>
                                            0
                                        <?php endif; ?>
                                        </div>
                                        WishList <img src="<?php echo e(asset('front/assets/imgs/wishlist.svg')); ?>" alt="wishlist">
                                    </a>
                                </li>
                                <?php if(auth()->guard()->check()): ?>
                                <li class="d-md-block d-none">
                                    <a href="<?php echo e(route('my-property.index')); ?>" class="d-flex align-items-center">
                                        😊 <span id="greetings"></span>&nbsp;



                                        <?php
                                            $user = auth()->user();
                                            $name = explode(' ',$user->name);
                                        ?>
                                        <?php if($user->profile): ?>
                                        <?php
                                            $path = asset('uploads/'.$user->profile->photo);
                                        ?>
                                        <?php else: ?>
                                        <?php
                                            $path = asset('front/assets/imgs/user.svg');
                                        ?>
                                        <?php endif; ?>
                                        <img src="<?php echo e($path); ?>" alt="User" class="<?php if($user->profile): ?> headerProfileImg <?php else: ?> <?php endif; ?>">
                                        <?php echo e($name[0]); ?>

                                    </a>
                                </li>
                                <?php else: ?>

                                <li class="d-md-block d-none">
                                    <a href="<?php echo e(route('front.login')); ?>">
                                        Login<img src="<?php echo e(asset('front/assets/imgs/user.svg')); ?>" alt="login">
                                    </a>
                                </li>
                                <?php endif; ?>

                                <li class="d-md-block">
                                    <a href="<?php echo e(route('my-property.create')); ?>">
                                        Add Property  <img src="<?php echo e(asset('front/assets/imgs/plus.svg')); ?>" alt="add property">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-3">
                        <div class="topRight text-end">
                            <a href="<?php echo e(route('front.boost-detail')); ?>" class=" d-block d-md-block"  data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Promote your rental property to reach more people across additional placements">
                                PROMOTE
                            </a>
                            <a href="<?php echo e(route('findme.room')); ?>" class=" d-none d-md-block" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Need Assistance with property search ?">
                               Find Me Room
                            </a>
                            <a href="<?php echo e(route('front.shifthome')); ?>" class="colorBtn  d-none d-md-block"  data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Home Flat Office Shifting Packers and Movers Transport Services in Kathmandu">
                                 <i class="fas fa-truck-pickup"></i> Shift Home
                             </a>
                        </div>
                    </div>
                    <div class="mobileBottom d-block d-md-none">
                        <ul>
                            <li>
                                <a href="<?php echo e(route('front.home')); ?>">
                                    <i class="fas fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('findme.room')); ?>">
                                    <i class="fas fa-search"></i>
                                    Find Me Room
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('login')); ?>">
                                    <i class="fas fa-user"></i>
                                    Login / Signup
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('front.shifthome')); ?>">
                                    <i class="fas fa-truck-moving"></i>
                                    Shift Home
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Site Footer start -->
    <!-- Lopgin signup Box -->
   <?php echo $__env->yieldContent('content'); ?>


   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Your Own Forum</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('submit.forum')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="customForm">
                    <textarea placeholder="Your Message" name="comment" id="" cols="30" rows="10"><?php echo e(old('comment')); ?></textarea>
                </div>
                <div class="customForm text-end">
                    <button class="colorBtn" type="submit">
                      Post Your Question <i class="flaticon-right-arrow ps-2"></i>
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>



  <script>
    window.onscroll = function() {scrollOnTop()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function scrollOnTop() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>



  


  <div class="modal fade" id="staticBackdrop" tabindex="" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdroptitle">Scan QR Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="customForm">

                        <img height="300px" src="<?php echo e(asset('uploads/'.$setting->qr_code)); ?>" alt="QR Code">
                </div>

        </div>
      </div>
    </div>
  </div>


  <?php echo $__env->make('front.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<?php echo $__env->make('front.layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/layouts/main.blade.php ENDPATH**/ ?>