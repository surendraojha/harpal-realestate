<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Harpal Property</title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo e(asset('front-new/css/bootstrap.min.css')); ?>">

    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo e(asset('front-new/css/all.css')); ?>">

    <!--Main CSS-->
    <link rel="stylesheet" href="<?php echo e(asset('front-new/css/style.css')); ?>">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <!--Owl Carousel-->
    <link rel="stylesheet" href="<?php echo e(asset('front-new/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-new/css/owl.theme.default.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('toaster.min.css')); ?>">


</head>
<body>

<header>

  <div class="logo-section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 logo-left">
          <a href="<?php echo e(route('front.home')); ?>" class="logo"><img src="<?php echo e(asset('uploads/'.$setting->company_logo)); ?>" alt=""></a>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 header-middle">
          <h6><a href="#"><i class="fa fa-plus"></i> Announcement</a> <a href="#">Earn and Invite 500 NRS <span>(Rules Apply)</span></a></h6>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 header-right">
          <ul>
            <li title="Notification"><a href="#"><i class="fa-solid fa-bell"></i> <span class="bell-message">1</span></a></li>
            <li title="Post"><a href="<?php echo e(route('commercial-property.create')); ?>"><i class="fa-solid fa-pen-to-square"></i> <span class="bell-message">1</span></a></li>
            <li title="Message"><a href="#"><i class="fa fa-comment"></i> <span class="bell-message">1</span></a></li>
            <li title="Signin / Login"><a href="<?php echo e(route('front.login')); ?>" class="login"><i class="fa fa-user"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <div class="model-popupbox">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><img src="./images/sabefe-logo.png" alt=""></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container register">
              <div class="row">
                  <div class="col-md-12">
                      <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Jobseeker</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Employer</a>
                          </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="row register-form">
                                  <div class="col-md-12">
                                    <p>Login with your registered Email & Password.</p>
                                      <form method="post">
                                          <div class="form-group">
                                              <input type="text" name="LGform1_user" class="form-control" placeholder="Your Email *" value="" required=""/>
                                          </div>
                                          <div class="form-group">
                                              <input type="password" name="LGform1_pwd" class="form-control" placeholder="Your Password *" value="" required=""/>
                                          </div>
                                          <a href="#" class="btnForgetPwd" value="Login">Remember Me?</a>
                                          <a href="#" class="btnForgetPwd1" value="Login">Forget Password?</a>

                                          <div class="form-group">
                                            <button type="submit" name="LGform1" class="btnContactSubmit" value="Login">Login</button>
                                          </div>
                                          <hr>
                                          <p>Don't have an account? <a href="#">Register Now</a></p>
                                          <hr>
                                          <h6>OR</h6>
                                          <ul class="social-login">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                                          </ul>
                                      </form>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane fade show text-align form-new" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="row register-form">
                                <div class="col-md-12">
                                    <p>Login with your registered Email & Password.</p>
                                      <form method="post">
                                          <div class="form-group">
                                              <input type="text" name="LGform1_user" class="form-control" placeholder="Your Email *" value="" required=""/>
                                          </div>
                                          <div class="form-group">
                                              <input type="password" name="LGform1_pwd" class="form-control" placeholder="Your Password *" value="" required=""/>
                                          </div>
                                          <a href="#" class="btnForgetPwd" value="Login">Remember Me?</a>
                                          <a href="#" class="btnForgetPwd1" value="Login">Forget Password?</a>

                                          <div class="form-group">
                                            <button type="submit" name="LGform1" class="btnContactSubmit" value="Login">Login</button>
                                          </div>
                                          <hr>
                                          <p>Don't have an account? <a href="#">Register Now</a></p>
                                          <hr>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

<div class="mobile-header">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <span class="clickmenus" onclick="openNav()">&#9776; </span>
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div class="mobile-menus">
            <ul>
              <li><a href="#">Home</a></li>
              <li>
                <a href="#" type="text" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">About Us <i class="wsmenu-arrow fa fa-angle-down"></i></a>
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                  <div class="card card-body">
                  <ul>
                    <li><a href="#">Company</a></li>
                    <li><a href="#">Team Members</a></li>
                    <li><a href="#">Department</a></li>
                    <li><a href="#">Staff</a></li>
                    <li><a href="#">Network</a></li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#" type="text" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Land <i class="wsmenu-arrow fa fa-angle-down"></i></a>
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                  <div class="card card-body">
                  <ul>
                    <li><a href="#">Land Item Name</a></li>
                    <li><a href="#">Land Item Name</a></li>
                    <li><a href="#">Land Item Name</a></li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#" type="text" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">House <i class="wsmenu-arrow fa fa-angle-down"></i></a>
                <div class="collapse multi-collapse" id="multiCollapseExample3">
                  <div class="card card-body">
                  <ul>
                    <li><a href="#">House Item Name</a></li>
                    <li><a href="#">House Item Name</a></li>
                    <li><a href="#">House Item Name</a></li>
                    <li><a href="#">House Item Name</a></li>
                    <li><a href="#">House Item Name</a></li>
                    <li><a href="#">House Item Name</a></li>
                    <li><a href="#">House Item Name</a></li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#" type="text" data-toggle="collapse" data-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4">Apartment <i class="wsmenu-arrow fa fa-angle-down"></i></a>
                <div class="collapse multi-collapse" id="multiCollapseExample4">
                  <div class="card card-body">
                  <ul>
                    <li><a href="#">Apartment Item Name</a></li>
                    <li><a href="#">Apartment Item Name</a></li>
                    <li><a href="#">Apartment Item Name</a></li>
                    <li><a href="#">Apartment Item Name</a></li>
                    <li><a href="#">Apartment Item Name</a></li>
                    <li><a href="#">Apartment Item Name</a></li>
                    <li><a href="#">Apartment Item Name</a></li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#" type="text" data-toggle="collapse" data-target="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample5">Villa <i class="wsmenu-arrow fa fa-angle-down"></i></a>
                <div class="collapse multi-collapse" id="multiCollapseExample5">
                  <div class="card card-body">
                  <ul>
                    <li><a href="#">Villa Item Name</a></li>
                    <li><a href="#">Villa Item Name</a></li>
                    <li><a href="#">Villa Item Name</a></li>
                    <li><a href="#">Villa Item Name</a></li>
                    <li><a href="#">Villa Item Name</a></li>
                    <li><a href="#">Villa Item Name</a></li>
                    <li><a href="#">Villa Item Name</a></li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#" type="text" data-toggle="collapse" data-target="#multiCollapseExample6" aria-expanded="false" aria-controls="multiCollapseExample6">Restaurant <i class="wsmenu-arrow fa fa-angle-down"></i></a>
                <div class="collapse multi-collapse" id="multiCollapseExample6">
                  <div class="card card-body">
                  <ul>
                    <li><a href="#">Restaurant Item Name</a></li>
                    <li><a href="#">Restaurant Item Name</a></li>
                    <li><a href="#">Restaurant Item Name</a></li>
                    <li><a href="#">Restaurant Item Name</a></li>
                    <li><a href="#">Restaurant Item Name</a></li>
                    <li><a href="#">Restaurant Item Name</a></li>
                    <li><a href="#">Restaurant Item Name</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



</header>



<?php echo $__env->yieldContent('content'); ?>

<footer>
  <div class="top-footer">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-3 contact-info">
          <h4>Contact Info</h4>
          <p><i class="fa fa-map-marker-alt"></i> <?php echo e($setting->address); ?></p>
          <p><i class="fa fa-phone-volume"></i> <?php echo e($setting->phone); ?></p>
          <p><i class="fa fa-envelope"></i> <?php echo e($setting->email); ?></p>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3 links">
          <h4>Links</h4>
          <ul>
            <li><a href="#"> Login as Agency</a></li>
            <li><a href="#"> Privacy</a></li>
            <li><a href="#"> Terms Of Use</a></li>
            <li><a href="#"> Advertise</a></li>
            <li><a href="#"> Listing Policy</a></li>
          </ul>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3 links">
          <h4>Company</h4>
          <ul>
            <li><a href="#"> About</a></li>
            <li><a href="#"> Buying Guide</a></li>
            <li><a href="#"> Careers</a></li>
            <li><a href="#"> Contact</a></li>
            <li><a href="#"> Add Your Property</a></li>
          </ul>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3 footer-socials">
          <h4>Subscribe Us</h4>
          <form method="post" action="<?php echo e(route('newsletter.post')); ?>" class="content">
            <?php echo csrf_field(); ?>
            <div class="input-group">
             <input name="email" type="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="Enter your email">
             <span class="input-group-btn">
              <button class="btn" type="submit"><i class="fa fa-paper-plane"></i></button>
             </span>
            </div>
        </form>
          <h5>Follow Us</h5>
          <ul>
            <li><a target="_blank" href="<?php echo e($setting->facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
            <li><a target="_blank" href="<?php echo e($setting->twitter); ?>"><i class="fab fa-twitter"></i></a></li>
            <li><a target="_blank" href="<?php echo e($setting->linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a target="_blank" href="<?php echo e($setting->youtube); ?>"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="bottom-footer">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 copyright">
          <p>Copyright © <?php echo e(date('Y')); ?> <?php echo e($setting->company_name); ?>. All Rights reserved.</p>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 design">
          <p>Developed by : <a href="#" target="_blank">Webbank Nepal</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="scroll-top-wrapper show">
  <span class="scroll-top-inner">
    <i class="fa fa-angle-up"></i>
    <h5>TOP</h5>
  </span>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?php echo e(asset('front-new')); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('front-new')); ?>/js/popper.min.js"></script>
<script src="<?php echo e(asset('front-new')); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo e(asset('front-new')); ?>/js/main.js"></script>
<script src="<?php echo e(asset('front-new')); ?>/js/wow.min.js"></script>

<?php echo $__env->yieldPushContent('script'); ?>
<script>
  new WOW().init();
</script>

<script src="<?php echo e(asset('toaster.min.js')); ?>"></script>
<script type="text/javascript">
    <?php if(\Session::has('message')): ?>
        toastr.success("<?php echo e(\Session::get('message')); ?>");
    <?php endif; ?>

      <?php if(\Session::has('status')): ?>
        toastr.success("<?php echo e(\Session::get('status')); ?>");
    <?php endif; ?>
    <?php if($errors->any()): ?>

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error("<?php echo e($e); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(\Session::has('error')): ?>
        toastr.error("<?php echo e(\Session::get('error')); ?>");
    <?php endif; ?>
</script>
<script>
  wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
</script>
</body>
</html>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/layouts/main.blade.php ENDPATH**/ ?>